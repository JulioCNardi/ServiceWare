<?php
// Configurações do banco de dados
$db_name = "serviceware";
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Habilita o modo de exceção
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Configura o fetch padrão
} catch (PDOException $e) {
    // Captura e exibe erros de conexão
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
