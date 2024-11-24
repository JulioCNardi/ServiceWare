<?php
include("../helpers/banco.php");
include("../models/Veiculo.php");

$id = filter_input(INPUT_GET, 'id');

if($id)
{
    $sql = $pdo->prepare("DELETE FROM veiculos WHERE idVeiculo = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}
?>

<script type="text/javascript">
    window.location = "../views/consultaVeiculo.php";
</script>