<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$id = filter_input(INPUT_POST, 'produtoId');
$nome = filter_input(INPUT_POST, 'nome');
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

    if ($produtoId && $nome && $quantidade && $valor) 
    {
        $sql = $pdo->prepare("UPDATE produto SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE produtoId = produtoId");
        $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $sql->execute();
    }

?>

<script type="text/javascript">
    window.location = "../views/consultaProdutoview.php";
</script>