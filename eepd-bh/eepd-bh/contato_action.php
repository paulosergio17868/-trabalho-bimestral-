<?php
require 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    $stmt = $pdo->prepare("INSERT INTO tb_contato (nome,email,assunto,mensagem) VALUES (?,?,?,?)");
    $stmt->execute([$nome,$email,$assunto,$mensagem]);

    header('Location: /contato.php?ok=1');
    exit;
}

header('Location: /contato.php');
exit;