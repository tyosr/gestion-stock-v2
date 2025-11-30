<?php
require_once __DIR__.'/../../app/auth.php';
require_once __DIR__.'/../../app/helpers.php';
admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO utilisateurs(username, password, role) VALUES (?,?,?)");
    $stmt->execute([$_POST['username'], $hash, $_POST['role']]);
    redirect('/views/admin/utilisateurs_list.php');
}

$users = $pdo->query("SELECT id, username, role FROM utilisateurs")->fetchAll();
?>
<div class="container">
  <h2>Utilisateurs</h2>
  <form method="post" class="row g-2 mb-3">
    <div class="col"><input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required></div>
    <div class="col"><input type="password" name="password" class="form-control" placeholder="Mot de passe" required></div>
    <div class="col-auto">
      <select name="role" class="form-select">
        <option value="vendeur">Vendeur</option>
        <option value="admin">Admin</option>
      </select>
    </div>
    <div class="col-auto"><button class="btn btn-primary">Ajouter</button></div>
  </form>
  <table class="table table-bordered">
    <thead class="table-light"><tr><th>ID</th><th>Nom</th><th>Rôle</th></tr></thead>
    <tbody>
      <?php foreach ($users as $u): ?>
      <tr>
        <td><?= $u['id'] ?></td>
        <td><?= e($u['username']) ?></td>
        <td><?= e($u['role']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>