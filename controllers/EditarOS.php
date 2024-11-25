<?php
include("../helpers/banco.php");
include("../models/Ordem.php");

$ordemId = filter_input(INPUT_POST, 'idOrdem', FILTER_VALIDATE_INT);
$dataAbertura = filter_input(INPUT_POST, 'dataAbertura');
$dataFechamento = filter_input(INPUT_POST, 'dataFechamento');      
$observacao = filter_input(INPUT_POST, 'observacao');


$produtos = $_POST['produtos'] ?? [];
$quantidades = $_POST['quantidade'] ?? [];

try {

    $pdo->beginTransaction();

    $sql = $pdo->prepare("
        UPDATE ordem 
        SET dataAbertura = :dataAbertura, 
            dataFechamento = :dataFechamento,  
            observacao = :observacao 
        WHERE idOrdem = :ordemId
    ");
    $sql->bindValue(':dataAbertura', $dataAbertura);
    $sql->bindValue(':dataFechamento', $dataFechamento);
    $sql->bindValue(':observacao', $observacao, PDO::PARAM_STR);
    $sql->bindValue(':ordemId', $ordemId, PDO::PARAM_INT);

    if (!$sql->execute()) {
        throw new Exception("Erro ao atualizar a ordem.");
    }

    $deleteProdutos = $pdo->prepare("DELETE FROM ordem_produtos WHERE idOrdem = :ordemId");
    $deleteProdutos->bindValue(':ordemId', $ordemId, PDO::PARAM_INT);
    $deleteProdutos->execute();

    if (!empty($produtos)) {
        $insertProduto = $pdo->prepare("INSERT INTO ordem_produtos (idOrdem, idProduto, quantidade) VALUES (:ordemId, :idProduto, :quantidade)");
        foreach ($produtos as $key => $idProduto) {
            $quantidade = $quantidades[$key] ?? 1; 
            $insertProduto->bindValue(':ordemId', $ordemId, PDO::PARAM_INT);
            $insertProduto->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
            $insertProduto->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
            $insertProduto->execute();
        }
    }
    $pdo->commit();

    header("Location: ../views/consultaOS.php");
    exit;
} catch (Exception $e) {
    $pdo->rollBack();
    die("Erro ao atualizar a ordem: " . $e->getMessage());
}
?>