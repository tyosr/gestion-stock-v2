<?php
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'gestionstock_v2';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'yosr';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (\PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>