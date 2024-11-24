<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$nome = filter_input(INPUT_POST, 'nome');
$valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);

try {
    $sql = $pdo->prepare("INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)");
    $sql->bindValue(':nome', $nome, PDO::PARAM_STR);
    $sql->bindValue(':valor', $valor);
    $sql->execute();
    echo "Produto cadastrado com sucesso!";
} catch (PDOException $e) {
    die("Erro ao cadastrar produto: " . $e->getMessage());
}

?>

<script type="text/javascript">
    window.location = "../views/consultaProduto.php";
</script>