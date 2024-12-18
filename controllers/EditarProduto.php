<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$produtoId = filter_input(INPUT_POST, 'produtoId', FILTER_VALIDATE_INT);
$nome = htmlspecialchars(trim(filter_input(INPUT_POST, 'nome')));
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

if (!$produtoId || !$nome || !$valor) {
    echo "Erro: Dados inválidos fornecidos!";
    exit;
}

try {
    $sql = $pdo->prepare("UPDATE produtos SET nome = :nome, valor = :valor WHERE Idproduto = :produtoId");
    $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':produtoId', $produtoId, PDO::PARAM_INT);

    if ($sql->execute()) {
    } else {
        echo "Erro ao atualizar o produto.";
    }
} catch (PDOException $e) {

    echo "Erro de banco de dados: " . $e->getMessage();
}

?>

<script type="text/javascript">
    window.location = "../views/consultaProduto.php";
</script>