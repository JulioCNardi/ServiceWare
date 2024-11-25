<?php
include("../helpers/banco.php");
include("../models/Ordem.php");

$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_VALIDATE_INT);
$dataAbertura = filter_input(INPUT_POST, 'dataAbertura');
$dataFechamento = filter_input(INPUT_POST, 'dataFechamento');
$observacao = filter_input(INPUT_POST, 'observacao');
$produtos = $_POST['produtos'] ?? [];
$quantidades = $_POST['quantidade'] ?? [];

try {
    $pdo->beginTransaction();

    // Inserir a ordem no banco
    $sql = $pdo->prepare("
        INSERT INTO ordem (dataAbertura, dataFechamento, observacao, idCliente) 
        VALUES (:dataAbertura, :dataFechamento, :observacao, :idCliente)
    ");
    $sql->bindValue(':dataAbertura', $dataAbertura);
    $sql->bindValue(':dataFechamento', $dataFechamento);
    $sql->bindValue(':observacao', $observacao, PDO::PARAM_STR);
    $sql->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);

    if ($sql->execute()) {
        $idOrdem = $pdo->lastInsertId();

        // Insere produtos da ordem
        if (!empty($produtos) && !empty($quantidades)) {
            $stmt = $pdo->prepare("INSERT INTO ordem_produtos (idOrdem, idProduto, quantidade) VALUES (:idOrdem, :idProduto, :quantidade)");

            foreach ($produtos as $key => $idProduto) {
                if (!empty($quantidades[$key])) {
                    $stmt->bindValue(':idOrdem', $idOrdem, PDO::PARAM_INT);
                    $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
                    $stmt->bindValue(':quantidade', $quantidades[$key], PDO::PARAM_INT);
                    $stmt->execute();
                }
            }
        }

        $pdo->commit();
        echo "Ordem cadastrada com sucesso!";
    } else {
        throw new Exception("Erro ao cadastrar a ordem.");
    }
} catch (Exception $e) {
    $pdo->rollBack();
    die("Erro ao cadastrar ordem: " . $e->getMessage());
}

?>

<script type="text/javascript">
    window.location = "../views/consultaOS.php";
</script>