<?php
session_start();                      // UNE SEULE FOIS
require_once __DIR__.'/../app/config.php';
require_once __DIR__.'/../app/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        redirect("/views/{$user['role']}/dashboard.php");
    } else {
        $error = "Identifiants incorrects";
        include __DIR__.'/../views/auth/login.php';
    }

}

?>