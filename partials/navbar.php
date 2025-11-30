<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">GestionStock</a>
    <div>
      <span class="text-light me-3"><?= $_SESSION['user']['username'] ?> (<?= $_SESSION['user']['role'] ?>)</span>
      <a class="btn btn-sm btn-outline-light" href="/logout.php">Déconnexion</a>
    </div>
  </div>
</nav>