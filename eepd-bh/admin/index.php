<?php
require '../conexao.php';
session_start();
if(empty($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin'){
    header('Location: /login.php'); exit;
}
require '../inc/header.php';
?>
<h2>Painel Administrativo</h2>
<p>Bem vindo, <?php echo htmlspecialchars($_SESSION['user']['nome']); ?>.</p>

<div class="list-group">
  <a href="/admin/posts.php" class="list-group-item list-group-item-action">Gerenciar Posts</a>
  <a href="/admin/carrossel.php" class="list-group-item list-group-item-action">Gerenciar Carrossel</a>
  <a href="/admin/professores.php" class="list-group-item list-group-item-action">Gerenciar Professores</a>
  <a href="/admin/alunos.php" class="list-group-item list-group-item-action">Gerenciar Alunos</a>
  <a href="/logout.php" class="list-group-item list-group-item-action text-danger">Sair</a>
</div>

<?php require '../inc/footer.php'; ?>