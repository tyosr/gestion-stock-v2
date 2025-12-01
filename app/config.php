<?php
// Azure SQL – connexion PDO via driver Microsoft sqlsrv
$host = getenv('DB_HOST') ?: 'gsql-v2-959.database.windows.net';
$db   = getenv('DB_NAME') ?: 'gestionstock_v2';
$user = getenv('DB_USER') ?: 'CloudSA4421af60';
$pass = getenv('DB_PASS') ?: 'MotDePasse123';
$port = 1433;

try {
    $pdo = new PDO(
        "sqlsrv:Server=$host,$port;Database=$db",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::SQLSRV_ATTR_ENCODING    => PDO::SQLSRV_ENCODING_UTF8
        ]
    );
    // petite vérification silencieuse
    $pdo->query("SELECT 1");
} catch (PDOException $e) {
    die("Connexion Azure SQL échouée : " . $e->getMessage());
}





/*$host = getenv('DB_HOST') ?: 'localhost';
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
    */
?>
