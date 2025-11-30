<?php
session_start();
function user_only() {
    if (!isset($_SESSION['user'])) {
        header('Location: /views/auth/login.php'); exit;
    }
}
function admin_only() {
    user_only();
    if ($_SESSION['user']['role'] !== 'admin') {
        header('Location: /views/vendeur/dashboard.php'); exit;
    }
}