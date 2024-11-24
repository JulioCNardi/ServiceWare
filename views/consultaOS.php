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
            <h2 class="h1 text-center">Ordem de Serviço</h2>
            <div class="col-12">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cadastrar Ordem de Serviço</a>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="col-12 text-center bg-light rounded" style="margin-top: 2rem; padding-left: 15rem; padding-right: 15rem;">
                        <h2 class="h3">Cadastro de Veiculos:</h2>
                        <br>
                        <form class="text-center" action="../controllers/CadastrarOS.php" method="POST">
                            <label for="nome" class="form-label">Data de abertura e fechamento da Ordem</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="dataAbertura" aria-label="dataAbertura" name="dataAbertura" required>
                                <input type="date" class="form-control" placeholder="dataFechamento" aria-label="dataFechamento" name="dataFechamento" required>
                            </div>
                            <label for="nome" class="form-label">Valor de Venda e descrição do serviço</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="valor de venda" aria-label="valorVenda" name="valorVenda" required>
                                <input type="textarea" class="form-control" placeholder="Descrição" aria-label="observacao" name="observacao" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 text-center" style="margin-top: 2rem;">
            <?php
                    $listaOrdem = [];
                    $sql = $pdo->query("SELECT * FROM ordem");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaOrdem = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
            ?>
                    <table class="table border table-dark table-striped">
                        <tr>
                            <th>ID Ordem</th>
                            <th>Data Abertura</th>
                            <th>Data Fechamento</th>
                            <th>Valor de venda</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>


                        <?php foreach($listaOrdem as $ordem): ?>
                        <tr class="text-center">
                            <td><?php echo $ordem['idOrdem']?></td>
                            <td><?php echo $ordem['dataAbertura']?></td>
                            <td><?php echo $ordem['dataFechamento']?></td>
                            <td><?php echo $ordem['valorVenda']?></td>
                            <td><?php echo $ordem['observacao']?></td>
                            <td><button class="btn btn-warning mx-3 text-white" type="button" data-bs-theme="dark"><a href="editarVeiculoView.php?id=<?=$ordem['idOrdem']?>"><i class="bi bi-pencil-fill"></i></a></button></td>
                            <td><button class="btn bg-danger mx-3" type="button " data-bs-theme="dark"><a href="../controllers/DeletarOrdem.php?id=<?=$ordem['idOrdem']?>"><i class="bi bi-trash-fill"></i></a></button></td>
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