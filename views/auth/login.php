<?php use App\Helpers\Csrf; use App\Helpers\View; use App\View\Components\Form; use App\View\Components\Ui; ob_start(); ?>
<?= Ui::pageHeader('Connexion', 'Accédez au portail ERP', ['eyebrow' => 'Authentification']) ?>
<section class="finea-section-card" style="max-width:520px">
  <?php if (!empty($error)): ?><p class="finea-alert finea-alert--danger"><?= View::e($error) ?></p><?php endif; ?>
  <form method="post" action="<?= View::url('login') ?>">
    <?= Csrf::field() ?>
    <?= Form::input('email', ['label' => 'Email', 'type' => 'email', 'required' => true]) ?>
    <?= Form::input('password', ['label' => 'Mot de passe', 'type' => 'password', 'required' => true]) ?>
    <?= Ui::button('Se connecter', ['type' => 'submit']) ?>
  </form>
  <p class="finea-field-hint">Starter : tout identifiant connecte en admin par défaut. À remplacer par AuthService.</p>
</section>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/app.php'; ?>
