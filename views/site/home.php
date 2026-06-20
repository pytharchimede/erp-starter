<?php use App\Helpers\View; ob_start(); ?>
<header class="site-hero">
  <nav class="site-nav">
    <strong><?= View::e($config['name'] ?? 'ERP Starter') ?></strong>
    <a href="<?= View::url('login') ?>">Espace ERP</a>
  </nav>
  <section class="site-hero-content">
    <p class="site-kicker">ERP • Portail • Site public</p>
    <h1><?= View::e($config['tagline'] ?? 'Socle ERP réutilisable') ?></h1>
    <p>Starter PHP natif avec routes, controllers, services, repositories, composants UI et tests.</p>
    <a class="site-btn" href="<?= View::url('login') ?>">Accéder au portail</a>
  </section>
</header>
<section class="site-section">
  <h2>À adapter à votre client</h2>
  <div class="site-grid">
    <article><h3>Branding</h3><p>Logo, couleurs, textes, sections et formulaires.</p></article>
    <article><h3>Modules</h3><p>Ajoutez les modules métier dans config/modules.php.</p></article>
    <article><h3>Architecture</h3><p>Dupliquez le module démo pour créer un vrai domaine métier.</p></article>
  </div>
</section>
<?php $content = ob_get_clean(); require BASE_PATH . '/views/layouts/site.php'; ?>
