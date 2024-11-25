<?php require_once("../helpers/banco.php") ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ServiceWare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<?php include("menu.php") ?>

<main class="container-fluid">
    <div class="row">
        <div class="col-1">

            <button class="btn float-start" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="bi bi-arrow-right-square-fill fs-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
            </button>
        </div>
        <div class="conteudo col-10 row">
            <h2 class="h1 text-center">Clientes</h2>
            <div class="col-12">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cadastrar Clientes</a>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="col-12 text-center bg-light rounded" style="margin-top: 2rem; padding-left: 15rem; padding-right: 15rem;">
                        <h2 class="h3">Cadastro de Clientes:</h2>
                        <br>
                        <form class="text-center" action="../controllers/CadastrarCliente.php" method="POST">
                            <label for="nome" class="form-label">Dados Pessoais</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="nome">
                                <input type="text" class="form-control" placeholder="CPF" aria-label="CPF" name="cpf">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email">
                                <input type="text" class="form-control" placeholder="Telefone" aria-label="telefone" name="telefone">
                            </div>
                            <label for="nome" class="form-label">Endereço</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cidade" aria-label="cidade" name="cidade">
                                <input type="text" class="form-control" placeholder="Rua" aria-label="endereco" name="endereco">
                                <input type="text" class="form-control" placeholder="Numero" aria-label="numero" name="numero">
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12 text-center" style="margin-top: 2rem;">
                <?php
                    $listaClientes = [];
                    $sql = $pdo->query("SELECT * FROM clientes");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaClientes = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>
                    <table class="table border table-dark table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Cidade</th>
                            <th>Endereço </th>
                            <th>Numero</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                            <th>Ações</th>
                        </tr>


                        <?php foreach($listaClientes as $cliente): ?>
                        <tr class="text-center">
                            <td class=><?php echo $cliente['idCliente']?></td>
                            <td class=><?php echo $cliente['nome']?></td>
                            <td class=><?php echo $cliente['cpf']?></td>
                            <td class=><?php echo $cliente['email']?></td>
                            <td class=><?php echo $cliente['cidade']?></td>
                            <td class=><?php echo $cliente['endereco']?></td>
                            <td class=><?php echo $cliente['numero']?></td>
                            <td class=><?php echo $cliente['telefone']?></td>
                            <td><button class="btn btn-warning mx-3" type="button" data-bs-theme="dark"><a href="editarClienteView.php?id=<?=$cliente['idCliente']?>"><i class="bi bi-pencil-fill"></i></a></button></td>
                            <td><button class="btn bg-danger mx-3" type="button " data-bs-theme="dark"><a href="../controllers/DeletarCliente.php?id=<?=$cliente['idCliente']?>"><i class="bi bi-trash-fill"></i></a></button></td>
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