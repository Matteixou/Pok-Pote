<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

final class ArenaController extends Controller
{
    /**
     * Affiche la sélection des Pokémon pour l'arène
     */
    public function index(): void
    {
        $products = Product::getAll();
        $this->render('arena/index', params: [
            'title' => 'Arène Pokémon',
            'products' => $products,
        ]);
    }

    /**
     * Lance un combat entre deux Pokémon
     */
    public function battle(): void
    {
        $pokemon1Id = $_POST['pokemon1'] ?? null;
        $pokemon2Id = $_POST['pokemon2'] ?? null;

        if (!$pokemon1Id || !$pokemon2Id) {
            header('Location: /arena');
            exit;
        }

        $pokemon1 = Product::findById((int)$pokemon1Id);
        $pokemon2 = Product::findById((int)$pokemon2Id);

        if (!$pokemon1 || !$pokemon2) {
            header('Location: /arena');
            exit;
        }

        // Lancer le combat
        $battleResult = $this->simulateBattle($pokemon1, $pokemon2);

        $this->render('arena/battle', params: [
            'title' => 'Combat en Arène',
            'pokemon1' => $pokemon1,
            'pokemon2' => $pokemon2,
            'result' => $battleResult,
        ]);
    }

    /**
     * Simule un combat entre deux Pokémon
     */
    private function simulateBattle(array $pokemon1, array $pokemon2): array
    {
        // Récupérer les stats
        $p1Stats = $this->getPokemonStats($pokemon1);
        $p2Stats = $this->getPokemonStats($pokemon2);

        // Calcul des avantages de type
        $typeAdvantage1 = $this->getTypeAdvantage($p1Stats['type'], $p2Stats['type']);
        $typeAdvantage2 = $this->getTypeAdvantage($p2Stats['type'], $p1Stats['type']);

        // CP aléatoires (0-100) attribués lors du combat
        $p1RandomCP = mt_rand(0, 100);
        $p2RandomCP = mt_rand(0, 100);

        // Puissance de base avec CP aléatoires
        $p1Power = $p1RandomCP * (1 + $typeAdvantage1 * 0.3);
        $p2Power = $p2RandomCP * (1 + $typeAdvantage2 * 0.3);

        // Ajouter variation aléatoire supplémentaire
        $p1Power *= (0.85 + (mt_rand(0, 30) / 100));
        $p2Power *= (0.85 + (mt_rand(0, 30) / 100));

        // Déterminer le gagnant
        $winner = $p1Power > $p2Power ? 1 : 2;
        $loser = $winner === 1 ? 2 : 1;

        // Messages détaillés du combat
        $battleLog = $this->generateBattleLog(
            $pokemon1,
            $pokemon2,
            $p1Stats,
            $p2Stats,
            $typeAdvantage1,
            $typeAdvantage2,
            $p1Power,
            $p2Power,
            $winner
        );

        return [
            'winner' => $winner,
            'loser' => $loser,
            'p1Power' => round($p1Power, 2),
            'p2Power' => round($p2Power, 2),
            'p1CP' => $p1RandomCP,
            'p2CP' => $p2RandomCP,
            'p1TypeAdvantage' => $typeAdvantage1,
            'p2TypeAdvantage' => $typeAdvantage2,
            'battleLog' => $battleLog,
        ];
    }

    /**
     * Récupère les stats du Pokémon à partir de sa description
     */
    private function getPokemonStats(array $pokemon): array
    {
        $description = strtolower($pokemon['description']);
        
        // Détecter le type
        $types = [
            'feu' => ['feu', 'fire', 'flamme', 'brûl'],
            'eau' => ['eau', 'water', 'aqua', 'vague'],
            'électrique' => ['électrique', 'electric', 'électr', 'tonnerre'],
            'plante' => ['plante', 'grass', 'herbe', 'feuille'],
            'glace' => ['glace', 'ice', 'froid', 'gel'],
            'combat' => ['combat', 'fight', 'boxe', 'punch'],
            'poison' => ['poison', 'toxic', 'venin'],
            'sol' => ['sol', 'ground', 'terre'],
            'vol' => ['vol', 'flying', 'air', 'aile'],
            'psychique' => ['psychique', 'psychic', 'mental'],
            'insecte' => ['insecte', 'bug', 'insect'],
            'roche' => ['roche', 'rock', 'pierre'],
            'spectre' => ['spectre', 'ghost', 'fantôme'],
            'dragon' => ['dragon', 'dragon'],
            'acier' => ['acier', 'steel', 'métal'],
            'fée' => ['fée', 'fairy', 'féé'],
            'normal' => ['normal'],
        ];

        $type = 'normal';
        foreach ($types as $typeName => $keywords) {
            foreach ($keywords as $keyword) {
                if (strpos($description, $keyword) !== false) {
                    $type = $typeName;
                    break 2;
                }
            }
        }

        return ['type' => $type];
    }

    /**
     * Calcule l'avantage de type (1 = avantage, 0 = neutre, -1 = désavantage)
     */
    private function getTypeAdvantage(string $type1, string $type2): float
    {
        $advantages = [
            'feu' => ['plante' => 1, 'glace' => 1, 'acier' => 1, 'eau' => -1, 'roche' => -1, 'sol' => -1],
            'eau' => ['feu' => 1, 'roche' => 1, 'sol' => 1, 'plante' => -1, 'électrique' => -1],
            'électrique' => ['eau' => 1, 'vol' => 1, 'plante' => -1],
            'plante' => ['eau' => 1, 'sol' => 1, 'roche' => 1, 'feu' => -1, 'glace' => -1, 'poison' => -1, 'vol' => -1],
            'glace' => ['plante' => 1, 'vol' => 1, 'sol' => 1, 'dragon' => 1, 'feu' => -1, 'combat' => -1, 'roche' => -1, 'acier' => -1],
            'combat' => ['normal' => 1, 'roche' => 1, 'acier' => 1, 'glace' => 1, 'spectre' => -1, 'vol' => -1, 'psychique' => -1, 'fée' => -1],
            'poison' => ['plante' => 1, 'fée' => 1, 'poison' => 0, 'roche' => -1, 'sol' => -1],
            'sol' => ['feu' => 1, 'électrique' => 1, 'poison' => 1, 'roche' => 1, 'acier' => 1, 'plante' => -1, 'eau' => -1],
            'vol' => ['plante' => 1, 'combat' => 1, 'insecte' => 1, 'électrique' => -1, 'roche' => -1],
            'psychique' => ['combat' => 1, 'poison' => 1, 'acier' => -1, 'psychique' => -1, 'spectre' => -1],
            'insecte' => ['plante' => 1, 'psychique' => 1, 'spectre' => 1, 'feu' => -1, 'combat' => -1, 'poison' => -1, 'vol' => -1, 'roche' => -1, 'acier' => -1, 'fée' => -1],
            'roche' => ['feu' => 1, 'glace' => 1, 'vol' => 1, 'insecte' => 1, 'sol' => -1, 'plante' => -1, 'acier' => -1],
            'spectre' => ['spectre' => 1, 'psychique' => 1, 'normal' => -1, 'combat' => -1],
            'dragon' => ['dragon' => 1, 'acier' => -1, 'fée' => -1],
            'acier' => ['glace' => 1, 'roche' => 1, 'fée' => 1, 'feu' => -1, 'eau' => -1, 'électrique' => -1, 'acier' => -1],
            'fée' => ['combat' => 1, 'spectre' => 1, 'spectre' => 1, 'poison' => -1, 'acier' => -1],
            'normal' => [],
        ];

        return $advantages[$type1][$type2] ?? 0;
    }

    /**
     * Génère le journal détaillé du combat
     */
    private function generateBattleLog(
        array $pokemon1,
        array $pokemon2,
        array $p1Stats,
        array $p2Stats,
        float $typeAdvantage1,
        float $typeAdvantage2,
        float $p1Power,
        float $p2Power,
        int $winner
    ): string
    {
        $log = "🎮 === DÉBUT DU COMBAT === 🎮\n\n";
        
        $log .= "⚔️ {$pokemon1['name']} (Type: " . ucfirst($p1Stats['type']) . ", CP: {$pokemon1['price']}) vs {$pokemon2['name']} (Type: " . ucfirst($p2Stats['type']) . ", CP: {$pokemon2['price']})\n\n";
        
        // Accueil dramtique aléatoire
        $greetings = [
            "Les deux combattants entrent dans l'arène... La foule retient son souffle!",
            "L'arbitre lève son drapeau... C'est parti pour un combat épique!",
            "Les spectateurs se lèvent de leurs sièges... Ça va être EXPLOSIF!",
            "Le commentateur hurle: 'BIENVENUE DANS L'ARÈNE POKÉMON!'",
            "Une tension électrique envahit le stade... Les combattants sont prêts!",
            "Les deux Pokémon se regardent intensément... Qui vaincra?",
            "Un moment de silence... avant que tout ne s'effondre.",
            "Les Pokémon prient silencieusement... ça sera rapide.",
            "L'assurance maladie augmente ses tarifs... c'est mauvais signe.",
            "Un ambulancier entre dans l'arène avec sa civière... prudence!",
        ];
        $log .= $greetings[array_rand($greetings)] . "\n\n";
        
        // Analyses des types
        $log .= "📊 ANALYSE DES TYPES:\n";
        $log .= "🔥 {$pokemon1['name']} vs {$pokemon2['name']}: ";
        if ($typeAdvantage1 > 0) {
            $advantageTexts = [
                "AVANTAGE MASSIF! {$pokemon1['name']} fait une pirouette victorieuse!",
                "C'EST L'AVANTAGE! {$pokemon1['name']} ne peut pas faire mieux!",
                "WOW! {$pokemon1['name']} a le type idéal pour cette bataille!",
                "SUPER EFFICACE! {$pokemon1['name']} sourit malveillamment...",
                "{$pokemon1['name']} ricane... {$pokemon2['name']} est déjà mort, il ne le sait pas encore.",
                "{$pokemon2['name']} commence à faire un testament mental...",
            ];
            $log .= $advantageTexts[array_rand($advantageTexts)] . " (+30% puissance)\n";
        } elseif ($typeAdvantage1 < 0) {
            $disadvantageTexts = [
                "OH NON! {$pokemon1['name']} a le mauvais type pour cette bataille...",
                "DÉSAVANTAGE CRITQUE! {$pokemon1['name']} transpire à grosses gouttes!",
                "AÏE! C'est du domage super efficace contre {$pokemon1['name']}!",
                "CATASTROPHE! {$pokemon1['name']} est clairement en retard...",
                "{$pokemon1['name']} se demande si les funérailles seront chères...",
                "{$pokemon1['name']} envisage sérieusement de quitter le métier.",
            ];
            $log .= $disadvantageTexts[array_rand($disadvantageTexts)] . " (-30% puissance)\n";
        } else {
            $neutralTexts = [
                "Les types s'annulent... C'est un duel équilibré!",
                "Aucun avantage évident... Les dés vont décider!",
                "Les types sont neutres... À la force pure maintenant!",
                "C'est équitable... Un de vous deux ne sortira pas vivant.",
            ];
            $log .= $neutralTexts[array_rand($neutralTexts)] . "\n";
        }
        
        $log .= "🔥 {$pokemon2['name']} vs {$pokemon1['name']}: ";
        if ($typeAdvantage2 > 0) {
            $advantageTexts = [
                "AVANTAGE MASSIF! {$pokemon2['name']} sourit triomphalement!",
                "C'EST L'AVANTAGE! {$pokemon2['name']} donne des coups de poing dans l'air!",
                "WOW! {$pokemon2['name']} a le type PARFAIT!",
                "SUPER EFFICACE! {$pokemon2['name']} se frotte les mains...",
                "{$pokemon2['name']} a l'air d'un prédateur face à sa proie...",
                "{$pokemon1['name']} commence à chercher les sorties de secours.",
            ];
            $log .= $advantageTexts[array_rand($advantageTexts)] . " (+30% puissance)\n";
        } elseif ($typeAdvantage2 < 0) {
            $disadvantageTexts = [
                "{$pokemon2['name']} commence à douter... Le type n'est pas bon...",
                "MAUVAIS MATCHUP! {$pokemon2['name']} semble inquiet!",
                "C'EST DU DOMMAGE! {$pokemon2['name']} n'aime pas ça!",
                "{$pokemon2['name']} grimace... Ce type est son point faible!",
                "{$pokemon2['name']} se demande combien de temps ça prendra...",
                "Regardez la peur dans les yeux de {$pokemon2['name']}...",
            ];
            $log .= $disadvantageTexts[array_rand($disadvantageTexts)] . " (-30% puissance)\n";
        } else {
            $log .= "Rien de spécial... L'équilibre parfait! (ou presque...)\n";
        }
        
        $log .= "\n⚡ DÉROULEMENT DU COMBAT:\n";
        
        // Mouvements d'ouverture aléatoires
        $openingMoves = [
            "{$pokemon1['name']} attaque en premier avec un cri de guerre!",
            "{$pokemon2['name']} prend l'initiative et charge!",
            "{$pokemon1['name']} fait un saut périlleux... c'est spectaculaire!",
            "{$pokemon2['name']} lance une série de coups rapides!",
            "{$pokemon1['name']} rugit... Le combat commence VRAIMENT!",
            "{$pokemon1['name']} dégaine son attaque... c'est impressionnant.",
            "{$pokemon2['name']} fait un clin d'œil sadique... ça va être horrible.",
            "{$pokemon1['name']} prend une profonde inspiration... ses dernières paroles?",
        ];
        $log .= $openingMoves[array_rand($openingMoves)] . "\n";
        
        // Combat animé
        $battleMoves = [
            "Une explosion retentit! {$pokemon1['name']} utilise une attaque massive!",
            "{$pokemon2['name']} esquive et contre-attaque instantanément!",
            "{$pokemon1['name']} lance une technique secrète!",
            "{$pokemon2['name']} brille intensément... Une technique spéciale se prépare!",
            "Les deux Pokémon échangent des coups rapides... c'est du TRÈS haut niveau!",
            "{$pokemon1['name']} utilise sa technique signature!",
            "{$pokemon2['name']} riposte avec une énergie décuplée!",
            "Une explosion d'énergie illumine l'arène!",
            "{$pokemon1['name']} pousse un cri de défi!",
            "{$pokemon2['name']} ne abandonne pas... La bataille continue!",
            "L'arène se remplit d'une fumée noire... personne ne voit rien.",
            "{$pokemon1['name']} crie: 'C'EST PAS JUSTE!' - Trop tard.",
            "{$pokemon2['name']} ricane méchamment... c'est sadique.",
            "Une pluie de débris retombe... {$pokemon1['name']} tousse.",
            "L'arbitre se demande s'il devrait arrêter le combat... non.",
        ];
        
        foreach (range(1, 2) as $i) {
            $log .= $battleMoves[array_rand($battleMoves)] . "\n";
        }
        
        $log .= "\n💥 PHASE FINALE:\n";
        
        $finalPhases = [
            "Les deux Pokémon sont épuisés... Qui fera le dernier point?",
            "Le moment de la vérité arrive...",
            "Les deux combattants donnent TOUT ce qu'ils ont!",
            "Une finale époustouflante se dessine!",
            "L'énergie monte à son paroxysme!",
            "L'un d'eux va tomber... probablement le plus faible.",
            "Les spectateurs retiennent leur respiration... ou tournent la tête.",
            "C'est maintenant ou jamais... pour celui qui gagne.",
            "Le destin se décide en ces instants critiques... ou pas.",
            "Un silence de mort envahit l'arène... littéralement.",
        ];
        $log .= $finalPhases[array_rand($finalPhases)] . "\n\n";
        
        $log .= "⚡ PUISSANCE FINALE:\n";
        $log .= "💪 {$pokemon1['name']}: " . round($p1Power, 0) . " points d'attaque";
        
        if ($p1Power > $p2Power) {
            $log .= " ✅ (Supérieur!)";
        } elseif ($p1Power < $p2Power) {
            $log .= " ❌ (Insuffisant...)";
        } else {
            $log .= " ⚖️ (Égal!)";
        }
        $log .= "\n";
        
        $log .= "💪 {$pokemon2['name']}: " . round($p2Power, 0) . " points d'attaque";
        
        if ($p2Power > $p1Power) {
            $log .= " ✅ (Supérieur!)";
        } elseif ($p2Power < $p1Power) {
            $log .= " ❌ (Insuffisant...)";
        } else {
            $log .= " ⚖️ (Égal!)";
        }
        $log .= "\n";
        
        $log .= "\n🏆 VERDICT FINAL:\n";
        if ($winner === 1) {
            $victoryMessages = [
                "🎉 {$pokemon1['name']} GAGNE SPECTACULAIREMENT le combat!\n😢 {$pokemon2['name']} s'effondre... C'est un K.O.!",
                "⚡ UNE VICTOIRE ÉCLATANTE pour {$pokemon1['name']}!\n😭 {$pokemon2['name']} ne peut pas continuer...",
                "🏅 {$pokemon1['name']} lève ses bras au ciel en victoire!\n💔 {$pokemon2['name']} concède la défaite avec honneur.",
                "🔥 {$pokemon1['name']} a écrasé la compétition!\n😮 {$pokemon2['name']} n'a rien vu venir!",
                "⭐ C'EST INCROYABLE! {$pokemon1['name']} a remporté le combat!\n👎 {$pokemon2['name']} regrette le jour de sa naissance...",
                "🎊 {$pokemon1['name']} peut enfin quitter l'arène vivant!\n⚰️ {$pokemon2['name']} demande qu'on l'achève rapidement.",
                "🌟 {$pokemon1['name']} a mystérieusement survécu!\n☠️ {$pokemon2['name']}... eh bien, c'est terminé pour lui.",
                "✨ {$pokemon1['name']} danse de victoire... {$pokemon2['name']} danse aussi, mais de douleur.",
                "🏆 {$pokemon1['name']} remporte la victoire et une assurance invalidité permanente pour {$pokemon2['name']}!",
            ];
            $log .= $victoryMessages[array_rand($victoryMessages)];
        } else {
            $victoryMessages = [
                "🎉 {$pokemon2['name']} GAGNE SPECTACULAIREMENT le combat!\n😢 {$pokemon1['name']} s'effondre... C'est un K.O.!",
                "⚡ UNE VICTOIRE ÉCLATANTE pour {$pokemon2['name']}!\n😭 {$pokemon1['name']} ne peut pas continuer...",
                "🏅 {$pokemon2['name']} lève ses bras au ciel en victoire!\n💔 {$pokemon1['name']} concède la défaite avec honneur.",
                "🔥 {$pokemon2['name']} a écrasé la compétition!\n😮 {$pokemon1['name']} n'a rien vu venir!",
                "⭐ C'EST INCROYABLE! {$pokemon2['name']} a remporté le combat!\n👎 {$pokemon1['name']} regrette le jour de sa naissance...",
                "🎊 {$pokemon2['name']} peut enfin quitter l'arène vivant!\n⚰️ {$pokemon1['name']} demande qu'on l'achève rapidement.",
                "🌟 {$pokemon2['name']} a mystérieusement survécu!\n☠️ {$pokemon1['name']}... eh bien, c'est terminé pour lui.",
                "✨ {$pokemon2['name']} danse de victoire... {$pokemon1['name']} danse aussi, mais de douleur.",
                "🏆 {$pokemon2['name']} remporte la victoire et une assurance invalidité permanente pour {$pokemon1['name']}!",
            ];
            $log .= $victoryMessages[array_rand($victoryMessages)];
        }
        
        $log .= "\n\n🎊 FIN DU COMBAT 🎊\n";
        
        return $log;
    }

    /**
     * Affiche la sélection du mode tournoi
     */
    public function tournament(): void
    {
        $products = Product::getAll();
        $this->render('arena/tournament', params: [
            'title' => 'Mode Tournoi',
            'products' => $products,
        ]);
    }

    /**
     * Lance un tournoi complet
     */
    public function runTournament(): void
    {
        $products = Product::getAll();

        if (count($products) < 2) {
            header('Location: /arena/tournament');
            exit;
        }

        // Simulation du tournoi
        $tournamentResults = $this->simulateTournament($products);

        $this->render('arena/tournament-results', params: [
            'title' => 'Résultats du Tournoi',
            'results' => $tournamentResults,
            'winner' => $tournamentResults['champion'],
        ]);
    }

    /**
     * Simule un tournoi complet avec tous les Pokémon
     */
    private function simulateTournament(array $products): array
    {
        $survivors = $products; // Copie pour les survivants
        $round = 1;
        $allRounds = [];

        while (count($survivors) > 1) {
            $roundMatches = [];
            $nextRound = [];

            // Créer les matchs de cette ronde
            for ($i = 0; $i < count($survivors) - 1; $i += 2) {
                $p1 = $survivors[$i];
                $p2 = $survivors[$i + 1];

                // Simuler le combat
                $battleResult = $this->simulateBattle($p1, $p2);

                $winner = $battleResult['winner'] === 1 ? $p1 : $p2;
                $loser = $battleResult['winner'] === 1 ? $p2 : $p1;

                $roundMatches[] = [
                    'p1' => $p1,
                    'p2' => $p2,
                    'winner' => $winner,
                    'loser' => $loser,
                    'p1Power' => $battleResult['p1Power'],
                    'p2Power' => $battleResult['p2Power'],
                ];

                $nextRound[] = $winner;
            }

            // S'il y a un nombre impair, le Pokémon sans adversaire passe automatiquement
            if (count($survivors) % 2 === 1) {
                $nextRound[] = $survivors[count($survivors) - 1];
            }

            $allRounds[] = [
                'roundNumber' => $round,
                'matches' => $roundMatches,
            ];

            $survivors = $nextRound;
            $round++;
        }

        return [
            'rounds' => $allRounds,
            'champion' => $survivors[0],
        ];
    }
}
