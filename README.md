# 🎮 POKÉ-MVC - Application Pokémon Interactive

<div align="center">

![Pokémon](https://img.shields.io/badge/Pokémon-Interactive%20App-red?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-8.0+-blue?style=flat-square&logo=php)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)
![Status](https://img.shields.io/badge/Status-Completed-brightgreen?style=flat-square)

**Une application web interactive complète construite avec PHP MVC pour capturer, entraîner et combattre des Pokémon !**

[Fonctionnalités](#-fonctionnalités) • [Installation](#-installation) • [Utilisation](#-utilisation) • [Architecture](#-architecture) • [Technologies](#-technologies)

</div>

---

## 📸 Aperçu

```
🏠 Page d'Accueil → 📚 Pokédex → 🤝 Best Friends → ⚔️ Arène → 🏆 Tournoi
```

- **Capturer des Pokémon** avec description et type
- **Consulter le Pokédex** avec tous vos Pokémon
- **Découvrir les compatibilités** entre Pokémon (système Best Friends)
- **Combattre en 1v1** avec système de types et CP aléatoires
- **Lancer des tournois** avec tous vos Pokémon
- **Humour noir** dans tous les combats ! 😂

---

## ✨ Fonctionnalités

### 🎯 Principales
- ✅ **CRUD Complet** - Créer, lire, modifier, supprimer des Pokémon
- ✅ **Système de Compatibilité** - Voir quels Pokémon s'entendent bien
- ✅ **Arène de Combat** - Combat 1v1 avec système de types
- ✅ **Mode Tournoi** - Tournoi d'élimination avec tous les Pokémon
- ✅ **Design Pokémon** - Interface retro avec gradients et animations
- ✅ **Messages Amusants** - Descriptions darkly comedic générées aléatoirement

### 🔧 Techniques
- ✅ **Architecture MVC** - Séparation claire des responsabilités
- ✅ **Routing Personnalisé** - Router simple et efficace
- ✅ **PSR-4 Autoloading** - Chargement automatique des classes
- ✅ **PDO MySQL** - Requêtes préparées sécurisées
- ✅ **Bootstrap 5** - Responsive design
- ✅ **Suppression Automatique** - Données effacées à la fermeture

---

## 🚀 Installation Rapide

### Prérequis
```
✓ PHP 8.0+
✓ MySQL 5.7+
✓ Apache/XAMPP
✓ Composer
```

### Étapes

1. **Cloner le repository**
```bash
git clone https://github.com/imed92/mini_mvc.git
cd mini_mvc
```

2. **Démarrer XAMPP**
   - Ouvrir **XAMPP Control Panel**
   - Cliquer **Start** sur **Apache** et **MySQL**
   - Vérifier que les deux sont en vert ✅

3. **Créer la Base de Données**

#### Option A : Via phpMyAdmin (Facile)
```
1. Aller sur http://localhost/phpmyadmin
2. Cliquer sur "Bases de données"
3. Créer une nouvelle base : "mini_mvc"
4. Cliquer "Créer"
5. Sélectionner la base "mini_mvc"
6. Cliquer sur "SQL"
7. Copier/coller le code SQL ci-dessous
8. Cliquer "Exécuter"
```

#### Option B : Via Terminal (Recommandé)
```bash
# Se connecter à MySQL
mysql -u root -p

# Entrer le mot de passe (vide par défaut sur XAMPP)
# Puis taper les commandes :

CREATE DATABASE mini_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mini_mvc;

CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# Vérifier que la table est créée
SHOW TABLES;
DESC product;

# Quitter
EXIT;
```

#### SQL Complet à Copier/Coller

```sql
-- Créer la base de données
CREATE DATABASE IF NOT EXISTS mini_mvc 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Utiliser la base
USE mini_mvc;

-- Créer la table des produits (Pokémon)
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL COMMENT 'Nom du Pokémon',
    description TEXT COMMENT 'Type et description',
    price DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT 'CP ou prix',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de création',
    INDEX idx_name (name),
    INDEX idx_created (created_at)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_unicode_ci
COMMENT='Table des Pokémon capturés';

-- Vérifier la création
SHOW TABLES;
DESC product;
```

4. **Configurer la connexion**
Éditer le fichier `app/config.ini` :
```ini
[database]
DB_HOST=127.0.0.1
DB_NAME=mini_mvc
DB_USERNAME=root
DB_PASSWORD=
DB_PORT=3306
DB_CHARSET=utf8mb4
```

**Explications** :
- `DB_HOST` : Adresse du serveur (localhost)
- `DB_NAME` : Nom de la base créée
- `DB_USERNAME` : Utilisateur MySQL (root par défaut)
- `DB_PASSWORD` : Mot de passe (vide par défaut sur XAMPP)
- `DB_PORT` : Port MySQL (3306 par défaut)
- `DB_CHARSET` : Encodage (UTF-8)

5. **Lancer le serveur**

#### Avec XAMPP
```
1. Mettre le dossier "mini_mvc" dans : C:\xampp\htdocs\
2. Aller sur : http://localhost/mini_mvc/public/
3. Ça marche ! 🎉
```

#### Avec CLI PHP
```bash
php -S localhost:8000 -t public/
# Puis aller sur http://localhost:8000/
```

6. **Tester la connexion**
   - Aller sur l'**Accueil**
   - Cliquer **"Capturer un Pokémon"**
   - Si ça fonctionne, la BD est bien configurée ✅

---

## 🗄️ Détails Base de Données

### Structure de la Table

```sql
+-------------+---------------+------+-----+-------------------+---
| Field       | Type          | Null | Key | Default           | 
+-------------+---------------+------+-----+-------------------+---
| id          | int(11)       | NO   | PRI | NULL              | 
| name        | varchar(255)  | NO   | MUL | NULL              | 
| description | text          | YES  |     | NULL              | 
| price       | decimal(10,2) | NO   |     | 0.00              | 
| created_at  | timestamp     | NO   |     | CURRENT_TIMESTAMP | 
+-------------+---------------+------+-----+-------------------+---
```

### Exemple de Données

```sql
-- Insérer des Pokémon de test
INSERT INTO product (name, description, price) VALUES
('Pikachu', 'Type Électrique, Pokémon avec des pouvoirs électriques', 50),
('Charizard', 'Type Feu/Vol, Crache du feu et vole rapidement', 75),
('Blastoise', 'Type Eau, Canons à eau très puissants', 70),
('Venusaur', 'Type Plante/Poison, Grandes fleurs toxiques', 65);

-- Vérifier les données
SELECT * FROM product;
```

### Connexion PDO

Le fichier `app/Core/Database.php` gère la connexion :

```php
public static function getPDO(): PDO
{
    if (self::$pdo === null) {
        $config = parse_ini_file(__DIR__ . '/../../app/config.ini');
        
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s;port=%s',
            $config['DB_HOST'],
            $config['DB_NAME'],
            $config['DB_CHARSET'],
            $config['DB_PORT']
        );
        
        self::$pdo = new PDO(
            $dsn,
            $config['DB_USERNAME'],
            $config['DB_PASSWORD']
        );
    }
    
    return self::$pdo;
}
```

### Requêtes Sécurisées

Toutes les requêtes utilisent **prepared statements** :

```php
// ✅ Sécurisé - Préparation des requêtes
$stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
$stmt->execute([$id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// ❌ Non sécurisé - Injection SQL possible
$result = $pdo->query("SELECT * FROM product WHERE id = $id");
```

---

## 🐛 Troubleshooting BD

### Erreur : "Base table or view not found"
```
❌ ERREUR: Table 'mini_mvc.product' doesn't exist
✅ SOLUTION: Exécuter le SQL pour créer la table
```

### Erreur : "Access denied for user 'root'@'localhost'"
```
❌ ERREUR: Mot de passe incorrect
✅ SOLUTION: Vérifier config.ini - laissez DB_PASSWORD vide si pas de MDP
```

### Erreur : "Can't connect to MySQL server"
```
❌ ERREUR: MySQL ne tourne pas
✅ SOLUTION: Lancer XAMPP et cliquer Start sur MySQL
```

### Vérifier la connexion

```bash
# Via terminal
mysql -u root -p

# Ou via PHP dans un fichier test.php
<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=mini_mvc', 'root', '');
    echo "✅ Connexion OK";
} catch (PDOException $e) {
    echo "❌ Erreur: " . $e->getMessage();
}
?>
```

3. **Créer la table**
```sql
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. **Lancer le serveur**
```bash
# Via XAMPP
http://localhost/mini_mvc/public/

# Ou en CLI
php -S localhost:8000 -t public/
```

5. **C'est prêt !** 🎉
Visitez `http://localhost:8000/` pour commencer

---

## ✅ Vérification Finale

Après installation, testez que tout fonctionne :

```bash
# 1. Vérifier que XAMPP tourne
# Apache et MySQL doivent être verts ✅

# 2. Vérifier que la BD existe
mysql -u root
SHOW DATABASES;  # Chercher "mini_mvc" ✅
EXIT;

# 3. Lancer le site
php -S localhost:8000 -t public/

# 4. Tester les fonctionnalités
# - Capturer un Pokémon ✅
# - Voir le Pokédex ✅
# - Faire un combat ✅
# - Lancer un tournoi ✅
```

Si tout fonctionne → **Installation réussie !** 🎉

---

## 📖 Utilisation

### 🎯 Capturer un Pokémon
```
1. Accueil → "Capturer un Pokémon"
2. Remplir : Nom + Type/Description
3. Les CP sont générés aléatoirement en combat (0-100)
```

### 📚 Consulter le Pokédex
```
1. Aller à "Pokémon" dans la navbar
2. Voir tous les Pokémon capturés
3. Actions : Infos / Best Friends / Éditer / Relâcher
```

### 🤝 Découvrir les Best Friends
```
1. Pokédex → 🤝 Friends pour un Pokémon
2. Voir le classement de compatibilité
3. Messages amusants pour chaque niveau d'amitié
```

### ⚔️ Faire un Combat
```
1. Arène → Sélectionner 2 Pokémon
2. Cliquer "COMBATTRE"
3. Voir le résultat avec journal du combat drôle
```

### 🏆 Lancer un Tournoi
```
1. Arène → "MODE TOURNOI"
2. Cliquer "LANCER LE TOURNOI"
3. Voir tous les matchs et le champion
```

**Documentation complète** : [README_UTILISATION.md](docs/README_UTILISATION.md)

---

## 🏗️ Architecture

### Structure du Projet

```
mini_mvc/
├── public/
│   └── index.php                 # Point d'entrée + routeur
│
├── app/
│   ├── config.ini                # Configuration DB
│   │
│   ├── Core/
│   │   ├── Router.php            # Routeur personnalisé
│   │   ├── Controller.php        # Classe de base des contrôleurs
│   │   ├── Database.php          # Singleton PDO
│   │   └── Model.php             # Classe de base des modèles
│   │
│   ├── Controllers/
│   │   ├── HomeController.php    # Page d'accueil
│   │   ├── ProductController.php # CRUD Pokémon + Compatibilité
│   │   └── ArenaController.php   # Combats + Tournoi
│   │
│   ├── Models/
│   │   ├── Product.php           # Modèle Pokémon
│   │   └── User.php              # Modèle Utilisateur (optionnel)
│   │
│   └── Views/
│       ├── layout.php            # Template maître
│       ├── home/
│       │   └── index.php         # Accueil
│       ├── product/
│       │   ├── index.php         # Pokédex
│       │   ├── create.php        # Capturer
│       │   ├── edit.php          # Entraîner
│       │   ├── show.php          # Détails
│       │   └── compatibility.php # Best Friends
│       └── arena/
│           ├── index.php         # Sélection combat
│           ├── battle.php        # Résultat combat
│           ├── tournament.php    # Sélection tournoi
│           └── tournament-results.php # Résultats
│
├── docs/
│   ├── README_START.md           # Installation du framework
│   ├── README_UTILISATION.md     # Guide complet d'utilisation
│   └── active-record.md          # Pattern Active Record
│
└── vendor/                        # Autoload Composer

```

### Flux MVC

```
Route → Controller → Model → View
  ↓         ↓          ↓       ↓
Request   Action     Query   HTML
```

### Système de Routing

```php
// public/index.php
$routes = [
    ['GET', '/', HomeController::class, 'index'],
    ['GET', '/products', ProductController::class, 'index'],
    ['GET', '/products/show', ProductController::class, 'show'],
    ['GET', '/products/compatibility', ProductController::class, 'compatibility'],
    ['POST', '/arena/battle', ArenaController::class, 'battle'],
    ['GET', '/arena/tournament', ArenaController::class, 'tournament'],
    // ... plus de routes
];
```

---

## 🎮 Système de Combat

### Calcul de Puissance

```
Puissance = CP × (1 + Avantage de Type × 0.3) × Variation(0.85-1.15)
```

#### Avantages de Type (Matrice 16 types)
```
🔥 Feu     → bat Plante, Insecte, Acier, Fée
💧 Eau     → bat Feu, Sol, Roche
⚡ Électrique → bat Eau, Vol
🌿 Plante  → bat Eau, Sol, Roche
❄️ Glace   → bat Dragon, Vol, Sol, Plante
👊 Combat  → bat Roche, Acier, Glace
☠️ Poison  → bat Plante, Fée
🌍 Sol     → bat Feu, Électrique, Poison, Roche, Acier
🦅 Vol     → bat Plante, Combat, Insecte
🧠 Psychique → bat Combat, Poison
🐛 Insecte → bat Plante, Psychique, Spectre, Fée
🪨 Roche   → bat Feu, Vol, Glace, Insecte
👻 Spectre → bat Psychique, Spectre
🐉 Dragon  → bat Dragon
⚙️ Acier   → bat Glace, Roche, Fée
✨ Fée     → bat Combat, Spectre, Obscur
```

#### CP Aléatoires
- **Pas attribués** à la capture
- **Générés en combat** : 0-100 pour chaque Pokémon
- **Rend imprévisible** : Même matchup = résultats différents

---

## 🎨 Design et UX

### Thème Pokémon
- 🎯 **Palette** : Gradient rouge, or, turquoise (Pokéball)
- 📝 **Police** : "Press Start 2P" pour titres rétro
- ✨ **Animations** : Bounce, scale, spin
- 📱 **Responsive** : Mobile, tablette, desktop

### Humour Darkly Comedic
```
Citations du combat :
- "Un ambulancier entre dans l'arène avec sa civière... prudence!"
- "L'assurance maladie augmente ses tarifs... c'est mauvais signe."
- "L'arbitre se demande s'il devrait arrêter le combat... non."
- "☠️ ...c'est terminé pour lui."

Compatibilité :
- ❤️ "Amis de cœur ! Ils ne peuvent plus se quitter !"
- 💔 "Ennemis jurés ! Feu et glace !"
```

---

## 💾 Gestion des Données

### Suppression Automatique
```javascript
// layout.php - beforeunload event
window.addEventListener('beforeunload', function() {
    navigator.sendBeacon('/products/deleteAll', new FormData());
});
```

**Résultat** : Chaque fermeture de page = Pokédex vide ✨

### Base de Données
```sql
CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🛠️ Technologies

| Technologie | Version | Utilisation |
|---|---|---|
| **PHP** | 8.0+ | Backend MVC |
| **MySQL** | 5.7+ | Base de données |
| **Bootstrap** | 5.3 | Framework CSS |
| **JavaScript** | ES6+ | Interactivité |
| **Composer** | Latest | Autoload PSR-4 |
| **Apache** | 2.4+ | Serveur web |

---

## 📊 Statistiques

```
📁 Fichiers : ~20 fichiers PHP
📝 Lignes de code : ~2000+ lignes
🗄️ Tables BD : 1 table (product)
🎮 Fonctionnalités : 8 principales
🎯 Routes : 13 routes actives
⏱️ Temps développement : ~4 heures
```

---

## 🚀 Roadmap / Améliorations Futures

- [ ] 💾 **Persistance des données** - Garder les Pokémon entre sessions
- [ ] 📊 **Statistiques** - Taux de victoire, matchs gagnés, etc.
- [ ] 👥 **Multiplayer** - Combattre d'autres joueurs
- [ ] 🎬 **Animations de combat** - Visualisation temps réel
- [ ] 🏅 **Système de badges** - Récompenses et accomplissements
- [ ] 🌐 **API REST** - Endpoints pour mobile
- [ ] 📱 **App Mobile** - Version PWA
- [ ] 🔐 **Authentification** - Système de comptes utilisateurs
- [ ] 🎨 **Thèmes** - Skins personnalisables
- [ ] 🌍 **Multijoueur en direct** - WebSockets pour combats live

---

## 🤝 Contribution

Les contributions sont bienvenues ! 🎉

1. Fork le repository
2. Créer une branche (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

### Guidelines
- Code clair et commenté
- Respecter la structure MVC
- Ajouter des tests si possible
- Mise à jour du README si nécessaire

---

## 📄 Licence

Ce projet est sous licence **MIT** - voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

## 👨‍💻 Auteur

**Imed92**
- GitHub: [@imed92](https://github.com/imed92)
- Date: 28 Novembre 2025

---

## 🙏 Remerciements

- Pokémon Company pour l'inspiration
- Bootstrap pour le framework CSS
- La communauté PHP pour les ressources

---

## 📚 Documentation

- 📖 [Guide d'Utilisation Complet](docs/README_UTILISATION.md)
- 🔧 [Installation du Framework](docs/README_START.md)
- 📝 [Pattern Active Record](docs/active-record.md)
- 💻 [Code Source Complet](.)

---

## ❓ FAQ

**Q: Les données persistent-elles ?**
R: Non, elles s'effacent automatiquement à la fermeture. C'est voulu pour une expérience fraîche à chaque visite ! 🎮

**Q: Combien de Pokémon peuvent participer au tournoi ?**
R: Tous ! Du 1er au dernier, c'est un tournoi complet. 🏆

**Q: L'humour est vraiment dark ?**
R: Oui, des blagues cyniques et morbides sur les Pokémon qui perdent ! 😂

**Q: Peut-on modifier les règles de combat ?**
R: Oui ! Le système est dans `ArenaController.php` - libre à vous de le personnaliser.

---

<div align="center">

### ⭐ Si vous aimez ce projet, n'oubliez pas de le star ! ⭐

**Gotta Catch 'Em All !** 🎮⚡🏆

</div>