<?php
include("../helpers/banco.php");
include("../models/Veiculo.php");

$modelo = filter_input(INPUT_POST, 'modelo'); 
$placa = filter_input(INPUT_POST, 'placa');    
$ano = filter_input(INPUT_POST, 'ano');        
$marca = filter_input(INPUT_POST, 'marca');    

try {
    // Preparando a consulta para inserir os dados no banco
    $sql = $pdo->prepare("INSERT INTO veiculos (modelo, placa, ano, marca) VALUES (:modelo, :placa, :ano, :marca)");
    $sql->bindValue(':modelo', $modelo, PDO::PARAM_STR);
    $sql->bindValue(':placa', $placa, PDO::PARAM_STR);
    $sql->bindValue(':ano', $ano, PDO::PARAM_STR);
    $sql->bindValue(':marca', $marca, PDO::PARAM_STR);
    
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
    window.location = "../views/consultaVeiculo.php";
</script>
