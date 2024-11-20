<?php
include("../helpers/banco.php");
include("../models/Cliente.php");

$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$endereco = filter_input(INPUT_POST, 'endereco');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$cidade = filter_input(INPUT_POST, 'cidade');
$numero = filter_input(INPUT_POST, 'numero');

try {
    $sql = $pdo->prepare("INSERT INTO clientes (nome, cpf, endereco, email, telefone, cidade, numero) VALUES (:nome, :cpf, :endereco, :email, :telefone, :cidade, :numero)");
    $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
    $sql->bindValue(':cpf', $cpf, PDO::PARAM_STR);
    $sql->bindValue(':cpf', $cpf,PDO::PARAM_STR);
    $sql->bindValue(':endereco', $endereco,PDO::PARAM_STR);
    $sql->bindValue(':email', $email,PDO::PARAM_STR);
    $sql->bindValue(':telefone', $telefone,PDO::PARAM_STR);
    $sql->bindValue(':cidade', $cidade,PDO::PARAM_STR);
    $sql->bindValue(':numero', $numero,PDO::PARAM_STR);
    
    $sql->execute();
    echo "Cliente cadastrado com sucesso!";
} catch (PDOException $e) {
    die("Erro ao cadastrar Cliente: " . $e->getMessage());
}

?>

<script type="text/javascript">
    window.location = "../views/cadastroClienteview.php";
</script>