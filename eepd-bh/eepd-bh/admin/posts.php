<?php
require '../conexao.php';
session_start();
if(empty($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin'){ header('Location: /login.php'); exit; }
require '../inc/header.php';

// criar post
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'criar'){
    $titulo = $_POST['titulo'] ?? '';
    $resumo = $_POST['resumo'] ?? '';
    $conteudo = $_POST['conteudo'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    $stmt = $pdo->prepare("INSERT INTO tb_posts (titulo,resumo,conteudo,imagem) VALUES (?,?,?,?)");
    $stmt->execute([$titulo,$resumo,$conteudo,$imagem]);
    header('Location: /admin/posts.php');
    exit;
}

// listar posts
$stmt = $pdo->query("SELECT * FROM tb_posts ORDER BY data_publicacao DESC");
$posts = $stmt->fetchAll();
?>

<h2>Gerenciar Posts</h2>

<h4>Criar Post</h4>
<form method="post">
  <input type="hidden" name="acao" value="criar">
  <div class="mb-3"><label>Título</label><input class="form-control" name="titulo" required></div>
  <div class="mb-3"><label>Resumo</label><input class="form-control" name="resumo"></div>
  <div class="mb-3"><label>URL imagem (opcional)</label><input class="form-control" name="imagem"></div>
  <div class="mb-3"><label>Conteúdo</label><textarea class="form-control" name="conteudo" rows="6"></textarea></div>
  <button class="btn btn-success">Salvar</button>
</form>

<hr>

<h4>Lista de Posts</h4>
<table class="table">
  <thead><tr><th>ID</th><th>Título</th><th>Data</th><th>Ações</th></tr></thead>
  <tbody>
    <?php foreach($posts as $p): ?>
      <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['titulo']); ?></td>
        <td><?php echo $p['data_publicacao']; ?></td>
        <td>
          <a href="/post.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">Ver</a>
          <a href="/admin/excluir_post.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require '../inc/footer.php'; ?>