<?php
require 'conexao.php';
require 'inc/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM tb_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if(!$post){
  echo "<div class='alert alert-warning'>Post não encontrado.</div>";
  require 'inc/footer.php';
  exit;
}
?>

<h2><?php echo htmlspecialchars($post['titulo']); ?></h2>
<p class="text-muted"><?php echo $post['data_publicacao']; ?></p>
<?php if($post['imagem']): ?>
  <img src="<?php echo htmlspecialchars($post['imagem']); ?>" class="img-fluid mb-3" style="max-height:400px; object-fit:cover;">
<?php endif; ?>
<div><?php echo nl2br(htmlspecialchars($post['conteudo'])); ?></div>

<?php require 'inc/footer.php'; ?>