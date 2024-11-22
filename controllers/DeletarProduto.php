<?php
include("../helpers/banco.php");
include("../models/Produto.php");

$id = filter_input(INPUT_GET, 'id');

if($id)
{
    $sql = $pdo->prepare("DELETE FROM produtos WHERE idProduto = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}
?>

<script type="text/javascript">
    window.location = "../views/consultaProdutoview.php";
</script>