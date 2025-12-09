<?php
require __DIR__ . '/../config/db.php';
include __DIR__ . '/../includes/header.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    if ($email === '' || $senha === '') {
        $error = 'Preencha email e senha.';
    } else {
        $stmt = $pdo->prepare("SELECT id,nome,senha,tipo FROM usuarios WHERE email = :email LIMIT 1");
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($senha, $user['senha'])) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['user_type'] = $user['tipo'];
            header('Location: ../index.php');
            exit;
        } else {
            $error = 'Credenciais inválidas.';
        }
    }
}
?>

<h1>Login</h1>
<?php if ($error): ?><div class="alert alert-danger"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="post">
  <div class="mb-3">
    <input type="email" name="email" class="form-control" placeholder="E-mail" required>
  </div>
  <div class="mb-3">
    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
  </div>
  <button class="btn btn-primary">Entrar</button>
  <a class="btn btn-link" href="cadastro.php">Criar conta</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
