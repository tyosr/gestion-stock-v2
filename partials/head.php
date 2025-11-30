<?php
if (session_status() === PHP_SESSION_NONE) session_start();   // ← ligne changée
include_once __DIR__.'/../app/config.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>GestionStock</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.105/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/assets/css/custom.css">