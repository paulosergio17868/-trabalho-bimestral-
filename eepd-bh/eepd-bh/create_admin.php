<?php
require 'conexao.php';

$nome = 'Administrador';
$email = 'admin@eepd.local';
$senha = 'admin123'; // mude depois
$hash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO tb_usuarios (nome,email,senha,tipo) VALUES (?,?,?, 'admin')");
try {
    $stmt->execute([$nome,$email,$hash]);
    echo "Admin criado: $email / senha: $senha - apague este arquivo create_admin.php após uso.";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}