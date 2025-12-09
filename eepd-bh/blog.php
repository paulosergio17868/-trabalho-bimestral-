<?php
require 'conexao.php';
require 'inc/header.php';

$stmt = $pdo->query("SELECT id, titulo, resumo, imagem, data_publicacao FROM tb_posts ORDER BY data_publicacao DESC");
$posts = $stmt->fetchAll();
?>

<h2>Blog</h2>

<?php foreach($posts as $p): ?>
  <div class="card mb-3">
    <div class="row g-0">
      <?php if($p['imagem']): ?>
      <div class="col-md-3">
        <img src="<?php echo htmlspecialchars($p['imagem']); ?>" class="img-fluid rounded-start" style="height: 150px; object-fit:cover;">
      </div>
      <?php endif; ?>
      <div class="col">
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($p['titulo']); ?></h5>
          <p class="card-text"><?php echo htmlspecialchars($p['resumo']); ?></p>
          <p class="card-text"><small class="text-muted"><?php echo $p['data_publicacao']; ?></small></p>
          <a href="/post.php?id=<?php echo $p['id']; ?>" class="btn btn-primary btn-sm">Leia mais</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php require 'inc/footer.php'; ?>