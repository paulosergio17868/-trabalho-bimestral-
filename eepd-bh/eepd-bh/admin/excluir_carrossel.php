<?php
require '../conexao.php';
session_start();
if(empty($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin'){ header('Location: /login.php'); exit; }
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if($id){
  $stmt = $pdo->prepare("DELETE FROM tb_carrossel WHERE id = ?");
  $stmt->execute([$id]);
}
header('Location: /admin/carrossel.php');
exit;