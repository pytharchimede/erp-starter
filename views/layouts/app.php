<?php use App\Helpers\View; ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= View::e($title ?? 'ERP Starter') ?></title>
  <link rel="stylesheet" href="<?= View::asset('css/app.css') ?>">
  <link rel="stylesheet" href="<?= View::asset('css/components.css') ?>">
  <link rel="stylesheet" href="<?= View::asset('css/finea-ui.css') ?>">
</head>
<body class="app-shell">
  <header class="topbar">
    <a href="<?= View::url('portail') ?>" class="brand">ERP Starter</a>
    <nav>
      <a href="<?= View::url('portail') ?>">Portail</a>
      <a href="<?= View::url('admin') ?>">Admin</a>
      <form method="post" action="<?= View::url('logout') ?>" style="display:inline"><button>Déconnexion</button></form>
    </nav>
  </header>
  <main class="app-main">
    <?= $content ?? '' ?>
  </main>
  <script src="<?= View::asset('js/app.js') ?>"></script>
  <script src="<?= View::asset('js/components.js') ?>"></script>
</body>
</html>
