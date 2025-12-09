<?php
require __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

$feedback = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $tipo = in_array($_POST['tipo'] ?? 'aluno', ['aluno','professor']) ? $_POST['tipo'] : 'aluno';

    if ($nome === '' || $email === '' || $senha === '') {
        $feedback = '<div class="alert alert-danger">Preencha todos os campos.</div>';
    } else {
        // Verifica se email já existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt->execute([':email'=>$email]);
        if ($stmt->fetchColumn() > 0) {
            $feedback = '<div class="alert alert-warning">E-mail já cadastrado.</div>';
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nome,email,senha,tipo,criado_em) VALUES (:nome,:email,:senha,:tipo,NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':nome'=>$nome, ':email'=>$email, ':senha'=>$hash, ':tipo'=>$tipo]);
            $feedback = '<div class="alert alert-success">Conta criada com sucesso. Faça login.</div>';
        }
    }
}
?>

<h1>Cadastro</h1>
<?= $feedback ?>
<form method="post">
  <div class="mb-3"><input type="text" name="nome" class="form-control" placeholder="Nome" required></div>
  <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="E-mail" required></div>
  <div class="mb-3"><input type="password" name="senha" class="form-control" placeholder="Senha" required></div>
  <div class="mb-3">
    <select name="tipo" class="form-select">
      <option value="aluno">Aluno</option>
      <option value="professor">Professor</option>
    </select>
  </div>
  <button class="btn btn-success">Criar conta</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
