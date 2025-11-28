# 📝 Changelog

Toutes les modifications notables du projet POKÉ-MVC sont documentées dans ce fichier.

Le format s'inspire du [Keep a Changelog](https://keepachangelog.com/fr/).

---

## [1.0.0] - 2025-11-28

### ✨ Ajouté (Added)

#### Fonctionnalités Principales
- **Page d'Accueil** : Présentation avec statistiques animées
- **Pokédex Complet** : Liste, création, modification, suppression de Pokémon
- **Système de Combat** : Arène 1v1 avec système de types (16 types)
- **Mode Tournoi** : Tournoi d'élimination complète
- **Système Best Friends** : Compatibilité entre Pokémon avec messages amusants
- **Détails Pokémon** : Affichage complet avec niveau calculé

#### Système Technique
- **Architecture MVC** : Séparation complète des responsabilités
- **Routing Personnalisé** : Routeur simple et efficace
- **Autoloading PSR-4** : Via Composer
- **Base de Données PDO** : Requêtes préparées et sécurisées
- **Suppression Automatique** : Données effacées à la fermeture (JavaScript)

#### Design & UX
- **Thème Pokémon** : Gradient Pokéball, police retro, animations
- **Responsive Design** : Mobile, tablette, desktop
- **Interface Intuitive** : Navigation claire et boutons explicites
- **Messages Amusants** : Humour darkly comedic dans les combats

#### Documentation
- **README.md** : Documentation principale complète
- **README_UTILISATION.md** : Guide d'utilisation détaillé
- **CONTRIBUTING.md** : Guide de contribution
- **Templates GitHub** : Issues templates pour bugs et features

### 🔧 Technique (Technical Details)

#### Controllers
- `HomeController` : Page d'accueil + Pokédex
- `ProductController` : CRUD Pokémon + Compatibilité
- `ArenaController` : Combat + Tournoi

#### Models
- `Product` : Entité Pokémon avec CRUD
- `Database` : Singleton PDO pour connexion DB

#### Views
- `layout.php` : Template maître avec Pokémon theme
- `home/index.php` : Page d'accueil
- `product/` : Pages CRUD + Compatibilité
- `arena/` : Pages combat + tournoi

#### Système de Combat
- CP aléatoires : 0-100 généré à chaque combat
- Matrice de types : 16 types avec avantages/désavantages
- Calcul puissance : `CP × (1 + Avantage×0.3) × Variation(0.85-1.15)`
- Messages aléatoires : 50+ descriptions différentes

### 📊 Statistiques

```
📁 Fichiers PHP : ~20
📝 Lignes de code : ~2000+
🗄️ Tables BD : 1 (product)
🎯 Routes actives : 13
🎨 Icônes/Emojis : 50+
```

---

## [0.1.0] - Avant Novembre 2025

### Fondations
- Framework MVC basique
- Authentification utilisateurs (non implémentée)
- Système CRUD de base

---

## 🚀 Roadmap - Version Futures

### v1.1.0 - Persistance des Données
- [ ] Système de comptes utilisateurs
- [ ] Stockage des données entre sessions
- [ ] Historique des combats

### v1.2.0 - Multijoueur
- [ ] Combats en 1v1 en ligne
- [ ] Système de chat
- [ ] Échanges de Pokémon

### v1.3.0 - Contenu Enrichi
- [ ] Système de badges/accomplissements
- [ ] Pokémon légendaires rares
- [ ] Quêtes et défis
- [ ] Élevage de Pokémon

### v2.0.0 - Mobile & API
- [ ] Application mobile (PWA)
- [ ] API REST complète
- [ ] Synchronisation multi-plateforme
- [ ] Notifications en temps réel

---

## 🔗 Comparaison des Versions

| Fonctionnalité | v1.0.0 | v1.1.0 (Plan) | v2.0.0 (Plan) |
|---|:---:|:---:|:---:|
| **CRUD Pokémon** | ✅ | ✅ | ✅ |
| **Combat 1v1** | ✅ | ✅ | ✅ |
| **Mode Tournoi** | ✅ | ✅ | ✅ |
| **Best Friends** | ✅ | ✅ | ✅ |
| **Comptes Utilisateurs** | ❌ | ✅ | ✅ |
| **Persistance Données** | ❌ | ✅ | ✅ |
| **Multijoueur** | ❌ | ✅ | ✅ |
| **API REST** | ❌ | ❌ | ✅ |
| **App Mobile** | ❌ | ❌ | ✅ |
| **Quêtes** | ❌ | ✅ | ✅ |

---

## 📌 Conventions de Versioning

Ce projet suit [Semantic Versioning](https://semver.org/lang/fr/) :

- **MAJOR** (1.0.0) : Changements incompatibles
- **MINOR** (1.1.0) : Nouvelles fonctionnalités
- **PATCH** (1.0.1) : Corrections de bugs

Format : `MAJOR.MINOR.PATCH`

---

## 🏷️ Tags Git

```bash
git tag -a v1.0.0 -m "Release version 1.0.0"
git push origin v1.0.0
```

---

## 📚 Comment Lire ce Fichier

- **Added** : Nouvelles fonctionnalités
- **Changed** : Modifications de fonctionnalités existantes
- **Deprecated** : Sera supprimé prochainement
- **Removed** : Suppression de fonctionnalités
- **Fixed** : Corrections de bugs
- **Security** : Corrections de sécurité

---

## 🔗 Liens Utiles

- 📖 [Guide d'Utilisation](docs/README_UTILISATION.md)
- 🔧 [Installation](docs/README_START.md)
- 🤝 [Guide de Contribution](CONTRIBUTING.md)
- 📄 [LICENSE MIT](LICENSE)

---

## 📧 Contact

Pour toute question : [@imed92](https://github.com/imed92)

---

**Gotta Catch 'Em All !** 🎮⚡🏆
