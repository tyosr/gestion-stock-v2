<?php
require_once __DIR__.'/../app/config.php';
require_once __DIR__.'/../app/auth.php';
admin_only();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $stmt = $pdo->prepare("INSERT INTO categories(nom) VALUES (?)");
        $stmt->execute([$_POST['nom']]);
    } elseif (isset($_POST['delete'])) {
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$_POST['id']]);
    }
    redirect('/views/admin/categories_list.php');
}
?>