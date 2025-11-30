<?php
session_start();
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    header("Location: views/$role/dashboard.php");
    exit;
} else {
    header("Location: views/auth/login.php");
    exit;
}
?>