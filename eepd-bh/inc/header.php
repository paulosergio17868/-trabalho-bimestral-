<?php
if(session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EEPD - Escola Presidente Dutra</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/estilo.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/index.php">EEPD - BH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="/cursos.php">Cursos</a></li>
        <li class="nav-item"><a class="nav-link" href="/blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="/contato.php">Contato</a></li>
        <?php if(!empty($_SESSION['user'])): ?>
          <li class="nav-item"><a class="nav-link" href="/admin/index.php">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="/logout.php">Sair</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main class="container my-4">