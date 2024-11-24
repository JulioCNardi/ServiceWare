<?php require_once("../helpers/banco.php");

    $cliente = [];
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id) 
    {
        $sql = $pdo->prepare("SELECT * FROM clientes where idCliente = :clienteId");
        $sql->bindValue(':clienteId', $id,PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);

        } else {
                header("Location: consultaCliente.php");
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
            <h2 class="h1 text-center">Clientes</h2>
            <div class="col-12">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cadastrar Clientes</a>
                    <div class="col-12 text-center bg-light rounded" style="margin-top: 2rem; padding-left: 15rem; padding-right: 15rem;">
                        <h2 class="h3">Edição de Clientes:</h2>
                        <br>
                        <form class="text-center" action="../controllers/EditarCliente.php" method="POST">
                            <input type="hidden" name="produtoId" value="<?=$cliente['idCliente']?>" />
                            <label for="nome" class="form-label">Dados Pessoais</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nome" aria-label="Nome" name="nome" value="<?=$cliente['nome']?>">
                                <input type="text" class="form-control" placeholder="CPF" aria-label="CPF" name="cpf" value="<?=$cliente['cpf']?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email" value=<?=$cliente['email']?>>
                                <input type="text" class="form-control" placeholder="Telefone" aria-label="telefone" name="telefone" value=<?=$cliente['telefone']?>>
                            </div>
                            <label for="nome" class="form-label">Endereço</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cidade" aria-label="cidade" name="cidade" value=<?=$cliente['cidade']?>>
                                <input type="text" class="form-control" placeholder="Rua" aria-label="endereco" name="endereco" value=<?=$cliente['endereco']?>>
                                <input type="text" class="form-control" placeholder="Numero" aria-label="numero" name="numero" value=<?=$cliente['numero']?>>
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