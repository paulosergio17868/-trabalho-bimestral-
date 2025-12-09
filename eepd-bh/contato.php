<?php
require 'inc/header.php';
$ok = isset($_GET['ok']) ? true : false;
?>

<h2>Contato</h2>
<?php if($ok): ?><div class="alert alert-success">Mensagem enviada com sucesso.</div><?php endif; ?>
<form action="/contato_action.php" method="post">
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>E-mail</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Assunto</label>
    <input type="text" name="assunto" class="form-control">
  </div>
  <div class="mb-3">
    <label>Mensagem</label>
    <textarea name="mensagem" class="form-control" rows="5" required></textarea>
  </div>
  <button class="btn btn-primary">Enviar</button>
</form>
<?php require 'inc/footer.php'; ?>