<?php
require_once __DIR__.'/../../app/auth.php';
require_once __DIR__.'/../../app/helpers.php';
admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';

$fournisseurs = $pdo->query("SELECT * FROM fournisseurs")->fetchAll();
?>
<div class="container">
  <h2>Fournisseurs</h2>
  <form method="post" action="../../controllers/fournisseurController.php" class="row g-2 mb-3">
    <div class="col"><input type="text" name="nom" class="form-control" placeholder="Nom" required></div>
    <div class="col"><input type="text" name="telephone" class="form-control" placeholder="Téléphone"></div>
    <div class="col"><input type="text" name="adresse" class="form-control" placeholder="Adresse"></div>
    <div class="col-auto"><button name="add" class="btn btn-primary">Ajouter</button></div>
  </form>
  <table class="table table-bordered">
    <thead class="table-light"><tr><th>ID</th><th>Nom</th><th>Téléphone</th><th>Adresse</th><th>Action</th></tr></thead>
    <tbody>
      <?php foreach ($fournisseurs as $f): ?>
      <tr>
        <td><?= $f['id'] ?></td>
        <td><?= e($f['nom']) ?></td>
        <td><?= e($f['telephone']) ?></td>
        <td><?= e($f['adresse']) ?></td>
        <td>
          <form method="post" action="../../controllers/fournisseurController.php" class="d-inline">
            <input type="hidden" name="id" value="<?= $f['id'] ?>">
            <button name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>