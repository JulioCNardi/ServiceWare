<?php
include("../helpers/banco.php");
include("../models/Veiculo.php");

$veiculoId = filter_input(INPUT_POST, 'veiculoId', FILTER_VALIDATE_INT);
$modelo = filter_input(INPUT_POST, 'modelo'); 
$placa = filter_input(INPUT_POST, 'placa');    
$ano = filter_input(INPUT_POST, 'ano');        
$marca = filter_input(INPUT_POST, 'marca');    


if ($veiculoId && $modelo && $placa && $ano && $marca) {

    $sql = $pdo->prepare("UPDATE veiculos SET modelo = :modelo, placa = :placa, ano = :ano, marca = :marca WHERE idVeiculo = :veiculoId");
    $sql->bindValue(':modelo', $modelo, PDO::PARAM_STR);
    $sql->bindValue(':placa', $placa, PDO::PARAM_STR);
    $sql->bindValue(':ano', $ano, PDO::PARAM_STR);
    $sql->bindValue(':marca', $marca, PDO::PARAM_STR);
    $sql->bindValue(':veiculoId', $veiculoId, PDO::PARAM_INT);

    if ($sql->execute()) {

        header("Location: ../views/consultaVeiculo.php");
        exit;
    } else {
        echo "Erro ao atualizar o veículo.";
    }
} else {
    echo "Todos os campos são obrigatórios.";
}
?>


