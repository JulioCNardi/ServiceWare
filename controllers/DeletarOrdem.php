<?php
include("../helpers/banco.php");
include("../models/Cliente.php");

$id = filter_input(INPUT_GET, 'id');

if($id)
{
    $sql = $pdo->prepare("DELETE FROM ordem WHERE idOrdem = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}
?>

<script type="text/javascript">
    window.location = "../views/consultaOS.php";
</script>