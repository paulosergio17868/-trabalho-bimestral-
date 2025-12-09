<?php
// conexao.php - PDO
$host = '127.0.0.1';
$db   = 'eepd';
$user = 'root';
$pass = ''; // deixe vazio no XAMPP padrão, ajuste se necessário
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Erro na conexão com o banco: " . $e->getMessage();
    exit;
}
?>