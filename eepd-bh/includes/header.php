<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EEPD-BH - Escola Presidente Dutra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">EEPD-BH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="pages/escola.php">Escola</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/cursos.php">Cursos</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="pages/contato.php">Contato</a></li>
        <?php if(!isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="auth/login.php">Login</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="auth/logout.php">Sair (<?=htmlspecialchars($_SESSION['user_name'])?>)</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main class="container my-4">
