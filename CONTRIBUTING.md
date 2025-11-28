# 🤝 Guide de Contribution

Merci de vouloir contribuer à **POKÉ-MVC** ! Voici comment procéder.

## 📋 Code of Conduct

- Soyez respectueux et bienveillant
- Pas de discrimination, harcèlement ou abus
- Tout le monde est bienvenu, peu importe le niveau

## 🚀 Comment Contribuer

### 1. Signaler un Bug 🐛

**Créer une Issue** avec :
- **Titre clair** : `[BUG] Description courte`
- **Description** : Ce qui se passe / ce qui devrait se passer
- **Étapes pour reproduire** : 1, 2, 3...
- **Logs/Screenshots** : Si pertinent
- **Environnement** : PHP version, navigateur, OS

Exemple :
```
Titre: [BUG] Le tournoi plante avec 1 seul Pokémon

Description:
Quand je lance le tournoi avec 1 seul Pokémon, le site plante.

Étapes:
1. Capturer 1 seul Pokémon
2. Aller à l'Arène → Mode Tournoi
3. Cliquer "Lancer le Tournoi"

Erreur: Fatal error in ArenaController.php line 45
```

### 2. Suggérer une Amélioration 💡

**Créer une Issue** avec :
- **Titre** : `[FEATURE] Description courte`
- **Motivation** : Pourquoi cette fonctionnalité ?
- **Description** : Comment ça devrait fonctionner
- **Alternatives** : Autres approches possibles

Exemple :
```
Titre: [FEATURE] Sauvegarder les données entre sessions

Motivation:
Les joueurs veulent garder leurs Pokémon capturés.

Description:
Ajouter un cookie/localStorage pour persister les données.
Ou mieux : système de comptes utilisateurs.

Alternatives:
- Garder les données 24h (pas complètement temporaire)
- Ajouter un bouton "Exporter mes données"
```

### 3. Soumettre une Pull Request 🔀

#### Setup Initial

```bash
# Fork le projet
git clone https://github.com/YOUR_USERNAME/mini_mvc.git
cd mini_mvc

# Créer une branche
git checkout -b feature/amazing-feature
```

#### Faire les Changements

1. **Respecter la structure MVC**
   ```
   Controllers/ → Models/ → Views/
   ```

2. **Écrire du code clair**
   ```php
   // ✅ BON
   public function calculateCompatibility(array $pokemon1, array $pokemon2): array
   {
       // Code lisible avec commentaires
   }
   
   // ❌ MAUVAIS
   public function cc($p1,$p2){$s=0;//...}
   ```

3. **Commenter les sections complexes**
   ```php
   /**
    * Calcule la compatibilité entre deux Pokémon
    * 
    * @param array $pokemon1 Premier Pokémon
    * @param array $pokemon2 Deuxième Pokémon
    * @return array Score de compatibilité et message
    */
   private function calculateCompatibility(array $pokemon1, array $pokemon2): array
   {
       // ...
   }
   ```

4. **Suivre les standards PSR-12**
   - Indentation : 4 espaces
   - Noms de classes : PascalCase
   - Noms de méthodes : camelCase
   - Constantes : UPPER_CASE

#### Tester

```bash
# Tester manuellement dans le navigateur
php -S localhost:8000 -t public/

# Vérifier la syntaxe
php -l app/Controllers/YourController.php
```

#### Commit et Push

```bash
# Ajouter les fichiers
git add app/Controllers/YourController.php

# Commit avec message clair
git commit -m "feat: add new feature to ArenaController

- Added function X
- Improved performance by Y
- Fixes #123"

# Push
git push origin feature/amazing-feature
```

#### Ouvrir la Pull Request

1. Allez sur **GitHub**
2. Cliquez **"Compare & pull request"**
3. **Titre** : `feat: description courte` ou `fix: description courte`
4. **Description** : Expliquez le pourquoi et le quoi
5. Cliquez **"Create pull request"**

### 4. Format de Commit

```
<type>: <subject>

<body>

Fixes #123
```

**Types** :
- `feat:` - Nouvelle fonctionnalité
- `fix:` - Correction de bug
- `docs:` - Modification de documentation
- `style:` - Formatage (pas de logique changée)
- `refactor:` - Réorganisation du code
- `perf:` - Amélioration de performance
- `test:` - Ajout/modification de tests

Exemples :
```
feat: add dark mode toggle to layout

fix: correct CP calculation in battle system

docs: update README with new features

refactor: simplify compatibility calculation logic
```

---

## 📝 Directives de Code

### Structure du Projet

Respecter l'organisation existante :

```
app/
├── Controllers/  ← Logique métier
├── Models/       ← Accès aux données
├── Views/        ← Templates HTML
└── Core/         ← Classes de base

public/
└── index.php     ← Router principal

docs/
└── README_*.md   ← Documentation
```

### Conventions de Nommage

```php
// ✅ Bonnes pratiques
class ProductController extends Controller { }
public function showCompatibility(): void { }
private function calculateScore(int $value): float { }
const MAX_POKEMON_POWER = 100;

// ❌ À éviter
class productcontroller { }
public function show_compat() { }
private function calc($v) { }
const maxPower = 100;
```

### Sécurité

```php
// ✅ Préparation des requêtes
$stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
$stmt->execute([$id]);

// ❌ Injection SQL
$query = "SELECT * FROM product WHERE id = $id";

// ✅ Échappement HTML
echo htmlspecialchars($userInput);

// ❌ XSS
echo $userInput;
```

### Documentation

```php
/**
 * Description courte et claire
 * 
 * Description détaillée si nécessaire.
 * Expliquer le "pourquoi" pas le "quoi".
 *
 * @param string $name Paramètre
 * @return array Description du retour
 * @throws Exception Si quelque chose plante
 */
public function doSomething(string $name): array
{
    // Code
}
```

---

## 🧪 Avant de Soumettre

- [ ] Le code suit les standards PSR-12
- [ ] Les fonctionnalités sont testées manuellement
- [ ] La documentation est mise à jour
- [ ] Pas de code commenté
- [ ] Pas de variables inutilisées
- [ ] Les messages sont explicites
- [ ] Pas de secrets/credentials en dur

---

## 🚫 Éléments Importants

**NE PAS** :
- Changer le système de compatibilité sans discussion
- Modifier le routing sans raison
- Supprimer les commentaires existants
- Ajouter des dépendances lourdes
- Commiter du code non-testé

**À FAIRE** :
- Tester votre code
- Commenter les algorithmes complexes
- Respecter le style existant
- Écrire des commits atomiques
- Mettre à jour les docs

---

## 📚 Ressources

- 📖 [Guide d'Utilisation](docs/README_UTILISATION.md)
- 📝 [README Principal](README.md)
- 🔧 [Installation](docs/README_START.md)
- 💡 [Architecture MVC](docs/README_STRUCTURE.md)

---

## ❓ Questions ?

Créer une **Issue** avec le tag `[QUESTION]` ou directement demander dans les Pull Requests !

---

## 🎉 Merci !

Toute contribution est appréciée, peu importe sa taille. Ensemble, on rend POKÉ-MVC encore mieux ! 🚀

**Gotta Code 'Em All !** 🎮
