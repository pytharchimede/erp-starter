<?php use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader('Accès refusé', 'Vous n’avez pas les droits nécessaires.', ['eyebrow' => 'Erreur 403']) ?>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
