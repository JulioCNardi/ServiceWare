<?php
include("../helpers/banco.php");
include("../models/Ordem.php");

$dataAbetura = filter_input(INPUT_POST, 'dataAbertura'); 
$dataFechamento = filter_input(INPUT_POST, 'dataFechamento');    
$valorVenda = filter_input(INPUT_POST, 'valorVenda', FILTER_VALIDATE_FLOAT);  
$observacao = filter_input(INPUT_POST, 'observacao');    

try {
    // Preparando a consulta para inserir os dados no banco
    $sql = $pdo->prepare("INSERT INTO ordem (dataAbertura, dataFechamento, valorVenda, observacao) VALUES (:dataAbertura, :dataFechamento, :valorVenda, :observacao)");
    $sql->bindValue(':dataAbertura', $dataAbetura);
    $sql->bindValue(':dataFechamento', $dataFechamento);  
    $sql->bindValue(':valorVenda', $valorVenda);
    $sql->bindValue(':observacao', $observacao, PDO::PARAM_STR);
    
    // Executando a inserção
    if ($sql->execute()) {
        echo "Veículo cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar veículo.";
    }
} catch (PDOException $e) {
    die("Erro ao cadastrar veículo: " . $e->getMessage());
}

?>

<script type="text/javascript">
    // Redireciona para a página de consulta de veículos
    window.location = "../views/consultaOS.php";
</script>