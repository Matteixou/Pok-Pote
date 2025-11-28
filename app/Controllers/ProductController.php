<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

final class ProductController extends Controller
{
    public function index(): void
    {
        $products = Product::getAll();
        $this->render('product/index', params: [
            'title' => 'Liste des produits',
            'products' => $products,
        ]);
    }

    public function create(): void
    {
        $this->render('product/create', params: [
            'title' => 'Créer un produit',
        ]);
    }

    public function store(): void
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? 0;

        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->save();

        header('Location: /products');
        exit;
    }

    public function show(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            echo 'Produit non trouvé';
            return;
        }

        $product = Product::findById((int)$id);
        if (!$product) {
            http_response_code(404);
            echo 'Produit non trouvé';
            return;
        }

        $this->render('product/show', params: [
            'title' => 'Détail du produit',
            'product' => $product,
        ]);
    }

    public function edit(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            echo 'Produit non trouvé';
            return;
        }

        $product = Product::findById((int)$id);
        if (!$product) {
            http_response_code(404);
            echo 'Produit non trouvé';
            return;
        }

        $this->render('product/edit', params: [
            'title' => 'Modifier le produit',
            'product' => $product,
        ]);
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            echo 'ID manquant';
            return;
        }

        $product = new Product();
        $product->setId((int)$id);
        $product->setName($_POST['name'] ?? '');
        $product->setDescription($_POST['description'] ?? '');
        $product->setPrice($_POST['price'] ?? 0);
        $product->update();

        header('Location: /products');
        exit;
    }

    public function delete(): void
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            echo 'ID manquant';
            return;
        }

        $product = new Product();
        $product->setId((int)$id);
        $product->delete();

        header('Location: /products');
        exit;
    }

    /**
     * Affiche les meilleures amies (compatibilité)
     */
    public function compatibility(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            echo 'Pokémon non trouvé';
            return;
        }

        $pokemon = Product::findById((int)$id);
        if (!$pokemon) {
            http_response_code(404);
            echo 'Pokémon non trouvé';
            return;
        }

        $allPokemons = Product::getAll();
        $compatibilityScores = [];

        // Calculer la compatibilité avec chaque Pokémon
        foreach ($allPokemons as $other) {
            if ($other['id'] !== $pokemon['id']) {
                $score = $this->calculateCompatibility($pokemon, $other);
                $compatibilityScores[] = [
                    'pokemon' => $other,
                    'score' => $score['score'],
                    'message' => $score['message'],
                ];
            }
        }

        // Trier par score décroissant
        usort($compatibilityScores, fn($a, $b) => $b['score'] <=> $a['score']);

        $this->render('product/compatibility', params: [
            'title' => 'Compatibilité Pokédex',
            'pokemon' => $pokemon,
            'compatibilities' => $compatibilityScores,
        ]);
    }

    /**
     * Calcule la compatibilité entre deux Pokémon
     */
    private function calculateCompatibility(array $pokemon1, array $pokemon2): array
    {
        $name1 = strtolower($pokemon1['name']);
        $name2 = strtolower($pokemon2['name']);
        
        $score = 0;
        $message = "";

        // Calcul basé sur les noms et descriptions
        $desc1 = strtolower($pokemon1['description']);
        $desc2 = strtolower($pokemon2['description']);

        // Vérifier les correspondances de types
        $types = ['feu', 'eau', 'électrique', 'plante', 'glace', 'combat', 'poison', 'sol', 'vol', 'psychique', 'insecte', 'roche', 'spectre', 'dragon', 'acier', 'fée'];
        
        $type1 = '';
        $type2 = '';
        
        foreach ($types as $type) {
            if (strpos($desc1, $type) !== false && !$type1) {
                $type1 = $type;
            }
            if (strpos($desc2, $type) !== false && !$type2) {
                $type2 = $type;
            }
        }

        // Points de base
        $baseScore = mt_rand(40, 60);

        // Bonus/malus selon les types
        $typeCompatibility = [
            'feu' => ['plante', 'insecte', 'acier', 'fée'],
            'eau' => ['feu', 'sol', 'roche'],
            'électrique' => ['eau', 'vol'],
            'plante' => ['eau', 'sol', 'roche'],
            'glace' => ['dragon', 'vol', 'sol', 'plante'],
            'combat' => ['roche', 'acier', 'glace', 'normal'],
            'poison' => ['plante', 'fée'],
            'sol' => ['feu', 'électrique', 'poison', 'roche', 'acier'],
            'vol' => ['plante', 'combat', 'insecte'],
            'psychique' => ['combat', 'poison'],
            'insecte' => ['plante', 'psychique', 'spectre', 'fée'],
            'roche' => ['feu', 'vol', 'glace', 'insecte'],
            'spectre' => ['psychique', 'spectre'],
            'dragon' => ['dragon'],
            'acier' => ['glace', 'roche', 'fée'],
            'fée' => ['combat', 'spectre', 'obscur'],
        ];

        $score = $baseScore;

        if ($type1 && $type2) {
            if (isset($typeCompatibility[$type1]) && in_array($type2, $typeCompatibility[$type1])) {
                $score += 30;
            } else {
                $score -= 10;
            }
        }

        // Messages amusants basés sur le score
        if ($score >= 85) {
            $messages = [
                "❤️ Amis de cœur ! Ils ne peuvent plus se quitter !",
                "💕 Compatibilité ultime ! C'est écrit dans les étoiles !",
                "🎉 Les âmes sœurs des Pokémon ! Magnifique !",
                "😍 Ils se regardent avec de grands yeux pleins d'amour !",
                "👫 Duo parfait ! Ils terminent même les phrases l'un de l'autre !",
            ];
        } elseif ($score >= 70) {
            $messages = [
                "😊 Très bons amis ! Ils s'entendent super bien !",
                "🤝 Excellent match ! Ils rient ensemble !",
                "💚 Pote de jeu ! Une belle amitié naît ici !",
                "⭐ Copains ! Ils s'échangent leurs secrets !",
                "🎈 Amis fidèles ! Rien ne peut les séparer !",
            ];
        } elseif ($score >= 55) {
            $messages = [
                "😐 Copains normaux. Ils s'ignorent poliment.",
                "🤔 Ça pourrait marcher... peut-être.",
                "😕 Meh, pas terrible mais ça va.",
                "🙂 Amis occasionnels. Ils se disent \"coucou\" parfois.",
                "🤷 C'est plutôt neutre entre eux.",
            ];
        } elseif ($score >= 40) {
            $messages = [
                "😒 Pas vraiment amis. Plutôt rivaux.",
                "⚠️ Tension dans l'air... attention aux étincelles !",
                "😠 Ils ne se regardent pas vraiment.",
                "👀 L'ambiance est un peu glaciale...",
                "🙄 Ils se tolèrent à peine.",
            ];
        } else {
            $messages = [
                "💔 Ennemis jurés ! Feu et glace !",
                "🔥❄️ Ils se battent sans arrêt !",
                "😡 Pires ennemis ! Ne les mettez pas ensemble !",
                "💥 C'est un désastre quand ils se rencontrent !",
                "⚡ TENSION EXTRÊME ! Ils se regardent méchamment !",
            ];
        }

        return [
            'score' => $score,
            'message' => $messages[array_rand($messages)],
        ];
    }

    /**
     * Supprime tous les produits
     */
    public function deleteAll(): void
    {
        Product::deleteAll();
        
        // Retourner une réponse JSON
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}
