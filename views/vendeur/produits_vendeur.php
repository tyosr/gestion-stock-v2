<?php
user_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';
$stmt = $pdo->query("SELECT p.*, c.nom AS cat FROM produits p LEFT JOIN categories c ON p.categorie_id = c.id");
$produits = $stmt->fetchAll();
?>
<div class="container">
  <h2>Produits</h2>
  <input id="search" class="form-control mb-3" placeholder="Rechercher...">
  <table class="table table-bordered">
    <thead class="table-light">
      <tr><th>Nom</th><th>Catégorie</th><th>Qté</th><th>Prix (DT)</th><th>Étiquette</th></tr>
    </thead>
    <tbody id="table-body">
      <?php foreach ($produits as $p): ?>
      <tr>
        <td><?= htmlspecialchars($p['nom']) ?></td>
        <td><?= htmlspecialchars($p['cat'] ?? '-') ?></td>
        <td class="<?= $p['quantite']<10?'text-danger fw-bold':'' ?>"><?= $p['quantite'] ?></td>
        <td><?= number_format($p['prix'],3) ?></td>
        <td><button class="btn btn-sm btn-outline-secondary" onclick="window.print()">🖨</button></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script src="/assets/js/search.js"></script>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>