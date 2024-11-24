<?php require_once("../helpers/banco.php") ?>

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
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cadastrar Veiculos</a>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="col-12 text-center bg-light rounded" style="margin-top: 2rem; padding-left: 15rem; padding-right: 15rem;">
                        <h2 class="h3">Cadastro de Veiculos:</h2>
                        <br>
                        <form class="text-center" action="../controllers/CadastrarVeiculo.php" method="POST">
                            <label for="nome" class="form-label">Dados do Veículo</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Modelo" aria-label="modelo" name="modelo" required>
                                <input type="text" class="form-control" placeholder="Placa" aria-label="placa" name="placa" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Ano" aria-label="ano" name="ano" required>
                                <input type="text" class="form-control" placeholder="Marca" aria-label="marca" name="marca" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 text-center" style="margin-top: 2rem;">
            <?php
                    $listaVeiculos = [];
                    $sql = $pdo->query("SELECT * FROM veiculos");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaVeiculos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>
                    <table class="table border table-dark table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Marca</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>


                        <?php foreach($listaVeiculos as $veiculo): ?>
                        <tr class="text-center">
                            <td><?php echo $veiculo['idVeiculo']?></td>
                            <td><?php echo $veiculo['placa']?></td>
                            <td><?php echo $veiculo['modelo']?></td>
                            <td><?php echo $veiculo['ano']?></td>
                            <td><?php echo $veiculo['marca']?></td>
                            <td><button class="btn btn-warning mx-3 text-white" type="button" data-bs-theme="dark"><a href="editarVeiculoView.php?id=<?=$veiculo['idVeiculo']?>"><i class="bi bi-pencil-fill"></i></a></button></td>
                            <td><button class="btn bg-danger mx-3" type="button " data-bs-theme="dark"><a href="../controllers/DeletarVeiculo.php?id=<?=$veiculo['idVeiculo']?>"><i class="bi bi-trash-fill"></i></a></button></td>
                        </tr>

                        <?php endforeach; ?>
                </table>
            </div>
            
        </div>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>