<?php
require __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

$feedback = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');
    if ($nome === '' || $email === '' || $mensagem === '') {
        $feedback = '<div class="alert alert-danger">Preencha todos os campos.</div>';
    } else {
        $sql = "INSERT INTO mensagens_contato (nome,email,mensagem,criado_em) VALUES (:nome,:email,:mensagem,NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nome'=>$nome, ':email'=>$email, ':mensagem'=>$mensagem]);
        $feedback = '<div class="alert alert-success">Mensagem enviada com sucesso. Obrigado!</div>';
    }
}
?>

<h1>Contato</h1>
<?= $feedback ?>
<form method="post" class="mb-4">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">E-mail</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Mensagem</label>
    <textarea name="mensagem" class="form-control" rows="5" required></textarea>
  </div>
  <button class="btn btn-primary">Enviar</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
