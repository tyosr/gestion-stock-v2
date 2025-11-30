<?php
include_once __DIR__.'/../../app/auth.php'; user_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';
$faible = $pdo->query("SELECT * FROM produits WHERE quantite < 10")->fetchAll();
?>
<div class="container">
  <h2>Tableau de bord Vendeur</h2>
  <?php if ($faible): ?>
    <div class="alert alert-warning">Produits en stock faible : <?= count($faible) ?></div>
  <?php endif; ?>
  <a href="produits_vendeur.php" class="btn btn-primary">Voir tous les produits</a>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>