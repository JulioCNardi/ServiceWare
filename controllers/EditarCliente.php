<?php
include("../helpers/banco.php");
include("../models/Cliente.php");

// Capturando os dados do POST
$clienteid = filter_input(INPUT_POST, 'produtoId', FILTER_VALIDATE_INT);  // Mudar para 'clienteId' se for cliente.
$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$endereco = filter_input(INPUT_POST, 'endereco');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$cidade = filter_input(INPUT_POST, 'cidade');
$numero = filter_input(INPUT_POST, 'numero');

// Preparando a consulta SQL
$sql = $pdo->prepare("UPDATE clientes SET nome = :nome, cpf = :cpf, endereco = :endereco, email = :email, telefone = :telefone, cidade = :cidade, numero = :numero WHERE idCliente = :clienteId");
$sql->bindValue(':nome', $nome, PDO::PARAM_STR);
$sql->bindValue(':cpf', $cpf, PDO::PARAM_STR);
$sql->bindValue(':endereco', $endereco, PDO::PARAM_STR);
$sql->bindValue(':email', $email, PDO::PARAM_STR);
$sql->bindValue(':telefone', $telefone, PDO::PARAM_STR);
$sql->bindValue(':cidade', $cidade, PDO::PARAM_STR);
$sql->bindValue(':numero', $numero, PDO::PARAM_STR);
$sql->bindValue(':clienteId', $clienteid, PDO::PARAM_INT);  // Garantindo que está atualizando o cliente correto

// Executando a consulta
if ($sql->execute()) {
    echo "Cliente atualizado com sucesso.";
} else {
    echo "Erro ao atualizar o cliente.";
}

?>

<script type="text/javascript">
    window.location = "../views/consultaCliente.php";
</script>

