<?php
include("../helpers/banco.php");
include("../models/Ordem.php");

// Capturando os dados do POST
$ordemId = filter_input(INPUT_POST, 'produtoId', FILTER_VALIDATE_INT);
$dataAbetura = filter_input(INPUT_POST, 'dataAbertura'); 
$dataFechamento = filter_input(INPUT_POST, 'dataFechamento');    
$valorVenda = filter_input(INPUT_POST, 'valorVenda', FILTER_VALIDATE_FLOAT);  
$observacao = filter_input(INPUT_POST, 'observacao');    

if ($ordemId && $dataAbetura && $dataFechamento && $valorVenda && $observacao) {
    // Preparando a consulta SQL
    $sql = $pdo->prepare("UPDATE ordem SET dataAbertura = :dataAbertura, dataFechamento = :dataFechamento, valorVenda = :valorVenda, observacao = :observacao WHERE idOrdem = :ordemId");
    $sql->bindValue(':dataAbertura', $dataAbetura);
    $sql->bindValue(':dataFechamento', $dataFechamento);  
    $sql->bindValue(':valorVenda', $valorVenda);
    $sql->bindValue(':observacao', $observacao, PDO::PARAM_STR);
    $sql->bindValue(':ordemId', $ordemId, PDO::PARAM_INT);

    // Executando a consulta
    if ($sql->execute()) {
        // Redireciona após a atualização bem-sucedida
        header("Location: ../views/consultaOS.php");
        exit;
    } else {
        // Mensagem de erro se a atualização falhar
        echo "Erro ao atualizar a ordem.";
    }
} else {
    echo "Todos os campos são obrigatórios.";
}
?>