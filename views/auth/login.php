<?php
require_once __DIR__.'/../../controllers/loginController.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion - GestionStock</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-card {
      max-width: 400px;
      margin: auto;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 1rem rgba(0,0,0,0.15);
    }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
  <div class="card login-card">
    <h4 class="mb-3 text-center"><i class="bi-box-seam"></i> GestionStock</h4>
    <h5 class="mb-3 text-center">Connexion</h5>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" class="form-control" required autofocus>
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100">Se connecter</button>
    </form>
  </div>
</body>
</html>