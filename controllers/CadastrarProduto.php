<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$nome = filter_input(INPUT_POST, 'nome');
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

try {
    $sql = $pdo->prepare("INSERT INTO produtos (nome, valor, quantidade) VALUES (:nome, :valor, :quantidade)");
    $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
    $sql->bindValue(':valor', $valor);
    $sql->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
    $sql->execute();
    echo "Produto cadastrado com sucesso!";
} catch (PDOException $e) {
    die("Erro ao cadastrar produto: " . $e->getMessage());
}

?>

<script type="text/javascript">
    window.location = "../views/consultaProdutoview.php";
</script>
