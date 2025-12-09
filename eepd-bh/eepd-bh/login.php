<?php
require 'conexao.php';
session_start();
$erro = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($senha, $user['senha'])){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'email' => $user['email'],
            'tipo' => $user['tipo']
        ];
        header('Location: /admin/index.php');
        exit;
    } else {
        $erro = 'E-mail ou senha inválidos.';
    }
}

require 'inc/header.php';
?>
<h2>Login</h2>
<?php if($erro): ?><div class="alert alert-danger"><?php echo $erro; ?></div><?php endif; ?>
<form method="post">
  <div class="mb-3">
    <label>E-mail</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Senha</label>
    <input type="password" name="senha" class="form-control" required>
  </div>
  <button class="btn btn-primary">Entrar</button>
</form>
<?php require 'inc/footer.php'; ?>