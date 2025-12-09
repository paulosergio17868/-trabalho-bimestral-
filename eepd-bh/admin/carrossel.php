<?php
require '../conexao.php';
session_start();
if(empty($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin'){ header('Location: /login.php'); exit; }
require '../inc/header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])){
  if($_POST['acao'] === 'adicionar'){
    $imagem = $_POST['imagem'] ?? '';
    $stmt = $pdo->prepare("INSERT INTO tb_carrossel (imagem) VALUES (?)");
    $stmt->execute([$imagem]);
    header('Location: /admin/carrossel.php'); exit;
  }
}

$imgs = $pdo->query("SELECT * FROM tb_carrossel ORDER BY id DESC")->fetchAll();
?>

<h2>Gerenciar Carrossel</h2>
<form method="post" class="mb-3">
  <input type="hidden" name="acao" value="adicionar">
  <div class="mb-3"><label>URL ou path da imagem</label><input class="form-control" name="imagem" placeholder="/assets/img/carrossel/exemplo.jpg" required></div>
  <button class="btn btn-success">Adicionar</button>
</form>

<table class="table">
  <thead><tr><th>ID</th><th>Imagem</th><th>Ações</th></tr></thead>
  <tbody>
    <?php foreach($imgs as $i): ?>
      <tr>
        <td><?php echo $i['id']; ?></td>
        <td><?php echo htmlspecialchars($i['imagem']); ?></td>
        <td>
          <a href="<?php echo htmlspecialchars($i['imagem']); ?>" target="_blank" class="btn btn-sm btn-secondary">Ver</a>
          <a href="/admin/excluir_carrossel.php?id=<?php echo $i['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require '../inc/footer.php'; ?>