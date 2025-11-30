<?php
include_once __DIR__.'/../../app/auth.php'; admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';
$stats = $pdo->query("
  SELECT
    (SELECT COUNT(*) FROM produits) AS nb_produits,
    (SELECT COUNT(*) FROM produits WHERE quantite < 10) AS stock_faible
")->fetch();
?>
<div class="container">
  <h2 class="mb-4">Tableau de bord Admin</h2>
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5><?= $stats['nb_produits'] ?></h5>
          <p>Produits référencés</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <h5><?= $stats['stock_faible'] ?></h5>
          <p>Stock faible</p>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-4">
    <a href="produits_list.php" class="btn btn-outline-primary">Gérer les produits</a>
    <a href="categories_list.php" class="btn btn-outline-secondary">Catégories</a>
    <a href="fournisseurs_list.php" class="btn btn-outline-secondary">Fournisseurs</a>
  </div>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>