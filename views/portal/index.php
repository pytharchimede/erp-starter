<?php use App\Helpers\View; use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader('Portail modules', 'Accédez aux modules disponibles', ['eyebrow' => 'ERP']) ?>
<div class="finea-module-grid">
<?php foreach ($modules as $module): ?>
  <a class="finea-module-card" href="<?= View::url(ltrim($module['url'], '/')) ?>">
    <span class="finea-module-icon"><?= View::e($module['icon'] ?? '📦') ?></span>
    <strong><?= View::e($module['name']) ?></strong>
    <p><?= View::e($module['description'] ?? '') ?></p>
  </a>
<?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
