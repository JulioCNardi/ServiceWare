<?php
include("../helpers/banco.php");
include("../models/Cliente.php");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    try {
        $pdo->beginTransaction();

        // Deleta primeiro os registros da tabela `ordem_produtos`
        $sqlProdutos = $pdo->prepare("DELETE FROM ordem_produtos WHERE idOrdem = :id");
        $sqlProdutos->bindValue(':id', $id, PDO::PARAM_INT);
        $sqlProdutos->execute();

        $sqlOrdem = $pdo->prepare("DELETE FROM ordem WHERE idOrdem = :id");
        $sqlOrdem->bindValue(':id', $id, PDO::PARAM_INT);
        $sqlOrdem->execute();

        $pdo->commit();

        echo "Ordem deletada com sucesso!";
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erro ao deletar a ordem: " . $e->getMessage());
    }
} else {
    die("ID inválido ou não fornecido.");
}
?>

<script type="text/javascript">

    window.location = "../views/consultaOS.php";
</script>