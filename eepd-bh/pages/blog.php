<?php
require __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

// Busca postagens no banco
$stmt = $pdo->query("SELECT p.id, p.titulo, p.conteudo, p.criado_em, u.nome AS autor 
                     FROM postagens p 
                     LEFT JOIN usuarios u ON u.id = p.autor_id
                     ORDER BY p.criado_em DESC
                     LIMIT 20");
$postagens = $stmt->fetchAll();
?>
<h1>Blog</h1>

<?php if (!$postagens): ?>
  <p>Nenhuma postagem encontrada.</p>
<?php else: ?>
  <?php foreach($postagens as $post): ?>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($post['titulo']) ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Por <?= htmlspecialchars($post['autor'] ?? 'Autor') ?> — <?= htmlspecialchars($post['criado_em']) ?></h6>
        <p class="card-text"><?= nl2br(htmlspecialchars(mb_strimwidth($post['conteudo'], 0, 400, '...'))) ?></p>
        <a href="#" class="card-link">Ler mais</a>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
