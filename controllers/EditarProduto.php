<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$id = filter_input(INPUT_POST, 'produtoId');
$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

    if ($produtoId && $nome && $quantidade && $valor) 
    {
        $sql = $pdo->prepare("UPDATE produto SET nome = :nome, valor = :valor WHERE produtoId = produtoId");
        $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
        $sql->bindValue(':valor', $valor);
        $sql->execute();
    }

?>