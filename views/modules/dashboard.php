<?php use App\Helpers\View; use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader($module['name'], $module['description'] ?? 'Module métier', ['eyebrow' => 'Module', 'actions' => [Ui::badge('Démo', 'info')]]) ?>
<section class="finea-section-card">
  <h2>Structure recommandée</h2>
  <pre>app/Controllers/<?= View::e(ucfirst($module['slug'])) ?>
app/Services/<?= View::e(ucfirst($module['slug'])) ?>
app/Repositories/<?= View::e(ucfirst($module['slug'])) ?>
routes/<?= View::e($module['slug']) ?>.php
views/<?= View::e($module['slug']) ?>/</pre>
</section>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
