# Architecture

Ce starter sépare le socle technique du métier.

- `routes/` : déclaration des URLs
- `app/Controllers/` : orchestration HTTP
- `app/Services/` : règles métier
- `app/Repositories/` : accès aux données
- `app/View/Components/` : composants HTML réutilisables
- `views/` : templates PHP
- `public/` : front controller et assets publics
- `config/` : configuration application, modules, permissions, base de données
- `database/migrations/` : SQL de création/évolution
- `tests/` : tests unitaires et feature

Le controller ne doit pas contenir de SQL ni de logique métier lourde. Le repository ne doit pas décider du métier. Le service est le centre des règles métier.
