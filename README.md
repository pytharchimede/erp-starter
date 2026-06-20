# ERP Universal Starter

Starter PHP natif **framework-like** extrait du socle ERP LBP, avec uniquement les éléments réutilisables et universels.

## Inclus

- Routeur PHP natif avec paramètres `/modules/{slug}`
- `Controllers / Services / Repositories / Models / Middleware`
- Layout application + layout site public
- Portail modules configurable
- Auth de démonstration à remplacer par votre vraie logique
- Middleware maintenance module par module
- Composants UI réutilisables : `Ui`, `Form`, `Html`, `Modal`, `Tabs`, `Navigation`, `RecordList`, etc.
- Assets CSS/JS réutilisables
- Configuration modules, permissions, app, database
- Tests PHPUnit de base
- Script de lint PHP

## Démarrage

```bash
composer install
cp .env.example .env
composer serve
```

Puis ouvrir :

```text
http://localhost:8000
http://localhost:8000/login
http://localhost:8000/portail
```

Dans ce starter, n’importe quel email/mot de passe connecte en admin. Remplacez cela par `AuthService` réel avant production.

## Créer un module métier

1. Ajouter le module dans `config/modules.php`
2. Créer `routes/<module>.php` ou déclarer ses routes dans `routes/web.php`
3. Créer :

```text
app/Controllers/<Module>/<Module>Controller.php
app/Services/<Module>/<Module>Service.php
app/Repositories/<Module>/<Module>Repository.php
views/<module>/
tests/Unit/Services/<Module>ServiceTest.php
```

## Ordre recommandé

```text
Cahier des charges
↓
User stories
↓
Tables SQL / migrations
↓
Repository
↓
Service
↓
Controller
↓
Routes
↓
Vues + Components
↓
Tests
```

## Branding

Modifier :

- `config/app.php`
- `public/assets/css/site.css`
- `views/site/home.php`
- `views/layouts/site.php`

## Maintenance module

Aller sur `/admin`, cocher un module, enregistrer. Le middleware bloque ensuite les URLs concernées.

## Tests

```bash
composer test
composer lint
```
