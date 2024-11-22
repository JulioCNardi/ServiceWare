<?php
include("../helpers/banco.php");
include("../models/Ordem.php");

$cliente = filter_input(INPUT_POST, 'cliente');
$produto = filter_input(INPUT_POST, 'produto', FILTER_VALIDATE_FLOAT);
$veiculo = filter_input(INPUT_POST, 'veiculo');
$dataAbertura = filter_input(INPUT_POST, 'dataAbertura',);
$dataFechamento = filter_input(INPUT_POST, 'dataFechamento',);
$valorVenda = filter_input(INPUT_POST, 'valorVenda');
$observacao = filter_input(INPUT_POST, 'observacao');



try {
    $sql = $pdo->prepare("INSERT INTO ordens (cliente,produto,veiculo,dataAbertura,dataFechamento,valorVenda,observacao) 
    VALUES (:cliente, :produto, :veiculo, :dataAbertura, :dataFechamento, :valorVenda, :observacao)");
    $sql->bindValue(':cliente', $cliente, PDO::PARAM_STR);
    $sql->bindValue(':produto', $produto);
    $sql->bindValue('veiculo', $veiculo);
    $sql->bindValue(':dataAbertura', $dataAbertura);
    $sql->bindValue(':dataFechamento', $dataFechamento);
    $sql->bindValue(':observacao', $observacao);
    $sql->execute();
    echo "Ordem cadastrada com sucesso!";
} catch (PDOException $e) {
    die("Erro ao cadastrar ordem: " . $e->getMessage());
}

?>

<script type="text/javascript">
    window.location = "../views/aberturaOSView.php";
</script>