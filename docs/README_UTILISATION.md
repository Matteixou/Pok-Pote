# 🎮 POKÉ-MVC - Guide d'Utilisation

Bienvenue dans **POKÉ-MVC**, l'application Pokémon ultime construite avec PHP et le framework Mini MVC !

## 📋 Table des matières

1. [Installation et Démarrage](#installation-et-démarrage)
2. [Fonctionnalités Principales](#fonctionnalités-principales)
3. [Guide Complet d'Utilisation](#guide-complet-dutilisation)
4. [FAQ](#faq)

---

## 🚀 Installation et Démarrage

### Prérequis
- PHP 8+
- MySQL/MariaDB
- Apache (XAMPP recommandé)
- Composer (autoload PSR-4)

### Configuration

1. **Cloner le projet**
   ```bash
   git clone <repository-url> mini_mvc
   cd mini_mvc
   ```

2. **Configurer la base de données**
   - Ouvrir `app/config.ini`
   - Vérifier les paramètres MySQL :
     ```ini
     DB_HOST=127.0.0.1
     DB_NAME=mini_mvc
     DB_USERNAME=root
     DB_PASSWORD=
     ```

3. **Créer la table produit** (si nécessaire)
   ```sql
   CREATE TABLE product (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       description TEXT,
       price DECIMAL(10,2) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Lancer le site**
   - Via XAMPP : `http://localhost/mini_mvc/public/`
   - Le site démarre avec un Pokédex vide

---

## 🎮 Fonctionnalités Principales

### 1. 🏠 Page d'Accueil
- **Affichage** : Présentation du projet avec statistiques aléatoires
- **Navigation rapide** : Accès aux principales fonctionnalités
- **6 sections fonctionnelles** : Pokédex, Capture, Arène, Tournoi, Best Friends, Entraînement

### 2. ⚡ Pokédex (Liste des Pokémon)
- **Affichage** : Tableau de tous les Pokémon capturés
- **Informations** : Numéro, Nom, Type, Pouvoir (CP)
- **Actions par Pokémon** :
  - 👁️ **Infos** : Voir les détails complets
  - 🤝 **Friends** : Voir les compatibilités avec d'autres Pokémon
  - ✏️ **Éditer** : Modifier le Pokémon
  - 🗑️ **Relâcher** : Supprimer le Pokémon

### 3. 🎯 Capturer un Pokémon
- **Formulaire simple** avec 2 champs :
  - **Nom** : Nom unique du Pokémon
  - **Type/Description** : Description du type et des pouvoirs
- **Capture automatique** : CP générés aléatoirement en combat (0-100)
- **Redirection** : Retour au Pokédex après capture

### 4. 🔍 Détails du Pokémon
- **Informations affichées** :
  - 🎯 Numéro Pokédex (ID)
  - ⚡ Points de Combat (CP)
  - 🎮 Niveau calculé (CP/10)
  - 💬 Description complète
- **Boutons d'action** :
  - ✏️ Entraîner : Modifier le Pokémon
  - 🤝 Best Friends : Voir les compatibilités
  - ⬅️ Retour : Revenir au Pokédex

### 5. ✏️ Entraîner un Pokémon
- **Modification possible** :
  - Nom
  - Type/Description
- **Note** : Les CP ne sont pas attribués ici (générés en combat)

### 6. 🤝 Système Best Friends (Compatibilité)
- **Classement** : Tous les Pokémon triés par score de compatibilité
- **Score** : 0-100% basé sur les types
- **Trois catégories d'amitiés** :
  - ❤️ **Amis de Cœur** (85%+) : Compatibilité ultime
  - 💚 **Très Bons Amis** (70%+) : Excellente alliance
  - 💛 **Copains Normaux** (55%+) : Neutre
  - 🧡 **Rivaux** (40%+) : Tension légère
  - 💔 **Ennemis Jurés** (<40%) : Incompatibilité totale

**Affichage pour chaque compatibilité** :
- Nom et description du Pokémon
- Barre de progression colorée
- Message amusant et personnalisé

### 7. ⚔️ Arène (Combat 1v1)
- **Sélection** : Choisir 2 Pokémon à faire combattre
- **Système de combat** :
  - CP aléatoires attribués (0-100) à chaque Pokémon
  - Calcul de puissance basé sur :
    - CP du Pokémon
    - Avantage de type (+30% ou -10%)
    - Variation aléatoire (85-115%)
  - Vainqueur automatiquement déterminé
- **Affichage du résultat** :
  - **Cartes du combat** : CP utilisés et puissance calculée
  - **Journal du combat** : Descriptions amusantes et drôles
  - **Messages darkly comedic** : Combat narré avec humour noir (citations cyniques, morbides, etc.)

**Types Pokémon Supportés** :
- Feu, Eau, Électrique, Plante, Glace, Combat
- Poison, Sol, Vol, Psychique, Insecte, Roche
- Spectre, Dragon, Acier, Fée

### 8. 🏆 Mode Tournoi
- **Fonctionnement** : Tous les Pokémon du Pokédex s'affrontent
- **Format** : Éliminations simples par rondes
- **Affichage** :
  - 👑 Champion ultime en évidence
  - 📋 Tous les matchs de chaque ronde
  - 🥇🥈🥉 Médailles pour les top 3
  - Puissances de combat affichées pour chaque match
- **Résultat amusant** : Chaque tournoi produit un champion différent

---

## 📖 Guide Complet d'Utilisation

### Scénario 1 : Capturer votre première équipe Pokémon

1. Allez sur la **Page d'Accueil** (`/`)
2. Cliquez sur **"🎯 Capturer un Pokémon"**
3. Remplissez le formulaire :
   - Nom : `Pikachu`
   - Type/Description : `Type Électrique, Pokémon avec des pouvoirs électriques`
4. Cliquez **"🎯 Capturer !"**
5. Répétez 3-4 fois pour avoir une bonne équipe

### Scénario 2 : Voir les détails d'un Pokémon

1. Allez au **Pokédex** (`/products`)
2. Cliquez sur **👁️ Infos** pour un Pokémon
3. Consultez :
   - Son numéro Pokédex
   - Son CP initial
   - Son niveau
   - Sa description complète

### Scénario 3 : Découvrir les compatibilités

1. Allez au **Pokédex** (`/products`)
2. Cliquez sur **🤝 Friends** pour un Pokémon
3. Regardez le **classement des meilleures compatibilités**
4. Lisez les **messages amusants** générés aléatoirement

### Scénario 4 : Faire combattre deux Pokémon

1. Allez à l'**Arène** (`/arena`)
2. Sélectionnez **Pokémon 1** et **Pokémon 2**
3. Cliquez **"⚡ COMBATTRE ! ⚡"**
4. Consultez le **résultat du combat** :
   - CP attribués aléatoirement
   - Journal du combat avec descriptions drôles
   - Vainqueur et perdant affichés

### Scénario 5 : Lancer un tournoi complet

1. Allez à l'**Arène** (`/arena`)
2. Cliquez sur **"🏆 MODE TOURNOI 🏆"**
3. Vérifiez que vous avez au moins **2 Pokémon**
4. Cliquez **"⚡ LANCER LE TOURNOI ⚡"**
5. Consultez les **résultats** :
   - Champion ultime
   - Tous les matchs par ronde
   - Puissances de combat affichées

### Scénario 6 : Entraîner un Pokémon

1. Allez au **Pokédex** (`/products`)
2. Cliquez sur **✏️ Éditer** pour un Pokémon
3. Modifiez :
   - Le nom
   - La description/type
4. Cliquez **"💾 Enregistrer"**

### Scénario 7 : Supprimer un Pokémon

1. Allez au **Pokédex** (`/products`)
2. Cliquez sur **🗑️ Relâcher** pour un Pokémon
3. Confirmez la suppression
4. Le Pokémon est supprimé du Pokédex

---

## 🔧 Architecture Technique

### Structure du Projet

```
mini_mvc/
├── public/
│   └── index.php           # Point d'entrée + routes
├── app/
│   ├── config.ini          # Configuration base de données
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   └── ArenaController.php
│   ├── Models/
│   │   ├── Product.php
│   │   └── User.php
│   ├── Core/
│   │   ├── Router.php
│   │   ├── Controller.php
│   │   ├── Database.php
│   │   └── Model.php
│   └── Views/
│       ├── layout.php
│       ├── home/
│       ├── product/
│       └── arena/
└── docs/
    └── README_UTILISATION.md
```

### Système de Compatibilité

Le système de compatibilité utilise une **matrice de types** :
- Chaque type Pokémon a des **avantages** (type super-efficace)
- **Bonus +30%** appliqué si avantage
- **Malus -10%** si inconvénient
- Variation aléatoire **85-115%** ajoutée

Exemple :
- Feu bat Plante, Insecte, Acier, Fée
- Eau bat Feu, Sol, Roche
- Électrique bat Eau, Vol
- etc.

---

## ⚙️ Gestion des Données

### Durée de Vie des Données

**Important** : Les données se **supprimaient automatiquement** à la fermeture de la page/onglet :

1. L'événement JavaScript `beforeunload` est déclenché
2. Une requête POST est envoyée à `/products/deleteAll`
3. Tous les Pokémon sont supprimés de la base de données
4. La page se ferme proprement

**Résultat** : À chaque nouvelle visite = Pokédex vide ✨

---

## 🎨 Design et Expérience Utilisateur

### Thème Pokémon
- 🎮 **Palette colorée** : Gradient rouge, or, turquoise (couleurs Pokéball)
- 📝 **Typographie rétro** : Utilisation de la police "Press Start 2P"
- 🎭 **Animations** : Effets bounce, scale, et spin
- ✨ **Responsive** : Adapté mobile, tablette, desktop

### Messages Amusants
- **Combat** : Descriptions darkly comedic et cyniques
- **Compatibilité** : Messages personnalisés par niveau d'amitiés
- **Aléatoire** : Nouvelle expérience à chaque action

---

## ❓ FAQ

### Q: Où mes Pokémon vont-ils ?
**R:** Les données se suppriment automatiquement à la fermeture de la page. Chaque visite = nouveau Pokédex vide. C'est volontaire ! 😄

### Q: Peut-on modifier les CP d'un Pokémon ?
**R:** Non, les CP sont générés aléatoirement **uniquement lors des combats** (0-100). Cela rend chaque combat imprévisible et amusant !

### Q: Comment fonctionne l'avantage de type ?
**R:** Basé sur une matrice complète de 16 types. Par exemple, Feu bat Planta, Glace, Acier (+30% de puissance).

### Q: Combien de Pokémon peuvent participer au tournoi ?
**R:** Tous ! Le mode tournoi inclut 100% du Pokédex dans un système d'élimination par rondes.

### Q: Les messages du combat sont-ils vraiment drôles ?
**R:** Oui ! Des descriptions cyniques et darkly comedic sont générées aléatoirement. À chaque combat, une nouvelle histoire ! 😂

### Q: Peut-on refaire un tournoi ?
**R:** Oui, autant de fois que vous le souhaitez ! Chaque tournoi produit un champion différent grâce à l'aléatoire.

### Q: Y a-t-il une limite au nombre de Pokémon ?
**R:** Non limite ! Capturez autant de Pokémon que vous voulez. Juste attention à la performance avec >1000 Pokémon 😄

---

## 🚀 Améliorations Futures Possibles

- 📊 **Statistiques persistantes** : Garder les résultats des combats
- 💾 **Sauvegarde des données** : Garder les Pokémon entre les sessions
- 🎬 **Animations de combat** : Visualiser le combat en direct
- 🏅 **Système de badges** : Récompenser les accomplissements
- 🌐 **Multiplayer** : Combattre avec d'autres joueurs
- 📱 **Application mobile** : Version PWA du site

---

## 📞 Support

Pour toute question ou problème :
1. Vérifiez la **Configuration MySQL**
2. Assurez-vous que **PHP 8+** est installé
3. Consultez les **routes** dans `public/index.php`
4. Vérifiez les **fichiers de vue** dans `app/Views/`

---

## 🎉 Amusez-vous !

**POKÉ-MVC** est une application amusante et interactive pour découvrir le monde Pokémon !

Capturez, entraînez, battez et profitez de l'expérience ! 🎮⚡🏆

---

*Créé avec ❤️ en PHP et Mini MVC Framework*
*© 2025 POKÉ-MVC | Gotta catch 'em all!*
