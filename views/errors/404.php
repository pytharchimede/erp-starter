<?php use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader('Page introuvable', 'La ressource demandée n’existe pas.', ['eyebrow' => 'Erreur 404']) ?>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
