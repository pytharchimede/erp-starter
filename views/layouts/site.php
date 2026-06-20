<?php use App\Helpers\View; ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= View::e($title ?? 'Site') ?></title>
  <link rel="stylesheet" href="<?= View::asset('css/site.css') ?>">
</head>
<body>
  <?= $content ?? '' ?>
  <script src="<?= View::asset('js/site.js') ?>"></script>
</body>
</html>
