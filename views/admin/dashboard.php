<?php use App\Helpers\View; use App\Helpers\Csrf; use App\View\Components\Ui; ob_start(); $maintenance = $_SESSION['maintenance_modules'] ?? []; ?>
<?= Ui::pageHeader('Administration', 'Socle, modules, maintenance et qualité', ['eyebrow' => 'Back-office']) ?>
<section class="finea-section-card">
  <h2>Maintenance modules</h2>
  <form method="post" action="<?= View::url('admin/maintenance') ?>">
    <?= Csrf::field() ?>
    <div class="finea-record-list">
    <?php foreach ($modules as $module): ?>
      <label class="finea-record-card">
        <input type="checkbox" name="maintenance[]" value="<?= View::e($module['slug']) ?>" <?= in_array($module['slug'], $maintenance, true) ? 'checked' : '' ?>>
        <strong><?= View::e($module['name']) ?></strong>
        <span><?= View::e($module['description'] ?? '') ?></span>
      </label>
    <?php endforeach; ?>
    </div>
    <?= Ui::button('Enregistrer la maintenance', ['type' => 'submit', 'variant' => 'accent']) ?>
  </form>
</section>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
