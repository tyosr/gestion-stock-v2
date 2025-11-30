<?php
require_once __DIR__.'/../app/config.php';
require_once __DIR__.'/../app/auth.php';
admin_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO fournisseurs(nom, telephone, adresse) VALUES (?,?,?)");
        $stmt->execute([$_POST['nom'], $_POST['telephone'], $_POST['adresse']]);
    } elseif (isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM fournisseurs WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
    redirect('/views/admin/fournisseurs_list.php');
}
?>