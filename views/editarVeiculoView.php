<?php 
require_once("../helpers/banco.php");

$veiculo = [];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    // Corrigindo a consulta para buscar um veículo pelo idVeiculo
    $sql = $pdo->prepare("SELECT * FROM veiculos WHERE idVeiculo = :veiculoId");
    $sql->bindValue(':veiculoId', $id, PDO::PARAM_INT); // Bind correto do parâmetro
    $sql->execute();

    if ($sql->rowCount() > 0) {
        // Corrigindo a variável para armazenar os dados do veículo
        $veiculo = $sql->fetch(PDO::FETCH_ASSOC); 
    } else {
        // Caso não encontre o veículo, redireciona para a página de consulta
        header("Location: consultaVeiculo.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ServiceWare</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<?php include("menu.php") ?>

<main class="container-fluid">
    <div class="row">
        <div class="col-1">
            <!-- toggler -->
            <button class="btn float-start" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="bi bi-arrow-right-square-fill fs-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
            </button>
        </div>
        <div class="conteudo col-10 row">
            <h2 class="h1 text-center">Veiculos</h2>
            <div class="col-12">
                    <div class="col-12 text-center bg-light rounded" style="margin-top: 2rem; padding-left: 15rem; padding-right: 15rem;">
                        <h2 class="h3">Edição de Veículo:</h2>
                        <br>
                        <form class="text-center" action="../controllers/EditarVeiculo.php" method="POST">
                            <input type="hidden" name="veiculoId" value="<?=$veiculo['idVeiculo']?>" />
                            <label for="nome" class="form-label">Dados do Veículo</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Modelo" aria-label="modelo" name="modelo" required value="<?=$veiculo['modelo']?>">
                                <input type="text" class="form-control" placeholder="Placa" aria-label="placa" name="placa" required value="<?=$veiculo['placa']?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ano" aria-label="ano" name="ano" required value="<?=$veiculo['ano']?>">
                                <input type="text" class="form-control" placeholder="Marca" aria-label="marca" name="marca" required value="<?=$veiculo['marca']?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
