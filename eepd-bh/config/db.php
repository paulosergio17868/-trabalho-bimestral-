<?php
// config/db.php
// Ajuste as credenciais conforme seu ambiente XAMPP
$DB_HOST = '127.0.0.1';
$DB_NAME = 'eepd_db';
$DB_USER = 'root';
$DB_PASS = ''; // coloque a senha do MySQL se houver

try {
    $pdo = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Mensagem amigável em produção poderia ser substituída
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
