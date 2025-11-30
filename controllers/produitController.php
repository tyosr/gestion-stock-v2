<?php
require_once __DIR__.'/../app/config.php';
require_once __DIR__.'/../app/helpers.php';
require_once __DIR__.'/../app/auth.php';
admin_only();

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$id]);
    redirect('../../views/admin/produits_list.php');   // ← chemin corrigé
}
?>