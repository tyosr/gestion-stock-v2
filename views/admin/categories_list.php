<?php
require_once __DIR__.'/../../app/auth.php';
require_once __DIR__.'/../../app/helpers.php';   // ← pour e()
admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>
<div class="container">
  <h2>Catégories</h2>
  <form method="post" action="../../controllers/categorieController.php" class="row g-2 mb-3">
    <div class="col-auto"><input type="text" name="nom" class="form-control" placeholder="Nouvelle catégorie" required></div>
    <div class="col-auto"><button name="add" class="btn btn-primary">Ajouter</button></div>
  </form>
  <table class="table table-bordered">
    <thead class="table-light"><tr><th>ID</th><th>Nom</th><th>Action</th></tr></thead>
    <tbody>
      <?php foreach ($categories as $c): ?>
      <tr>
        <td><?= $c['id'] ?></td>
        <td><?= e($c['nom']) ?></td>
        <td>
          <form method="post" action="../../controllers/categorieController.php" class="d-inline">
            <input type="hidden" name="id" value="<?= $c['id'] ?>">
            <button name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>