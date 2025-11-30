<?php
require_once __DIR__.'/../../app/auth.php';
require_once __DIR__.'/../../app/helpers.php';
admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';

$stmt = $pdo->query("SELECT p.*, c.nom AS cat, f.nom AS fourn FROM produits p
                     LEFT JOIN categories c ON p.categorie_id = c.id
                     LEFT JOIN fournisseurs f ON p.fournisseur_id = f.id");
$produits = $stmt->fetchAll();
?>
<div class="container">
  <h2>Produits</h2>
  <a href="produit_form.php" class="btn btn-success mb-3">Nouveau produit</a>
  <input id="search" class="form-control mb-3" placeholder="Rechercher...">
  <table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr><th>ID</th><th>Nom</th><th>Catégorie</th><th>Fournisseur</th><th>Qté</th><th>Prix (DT)</th><th>Actions</th></tr>
    </thead>
    <tbody id="table-body">
      <?php foreach ($produits as $p): ?>
      <tr>
        <td><?= $p['id'] ?></td>
        <td><?= e($p['nom']) ?></td>
        <td><?= e($p['cat'] ?? '-') ?></td>
        <td><?= e($p['fourn'] ?? '-') ?></td>
        <td class="<?= $p['quantite']<10?'text-danger fw-bold':'' ?>"><?= $p['quantite'] ?></td>
        <td><?= number_format($p['prix'],3) ?></td>
        <td>
          <a href="produit_form.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
          <a href="../../controllers/produitController.php?delete=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script src="/assets/js/search.js"></script>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>