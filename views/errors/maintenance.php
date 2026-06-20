<?php use App\Helpers\View; use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader('Module en maintenance', $state['message'] ?? 'Ce module est indisponible temporairement.', ['eyebrow' => View::e($state['slug'] ?? 'module')]) ?>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
