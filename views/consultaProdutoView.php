<!DOCTYPE html>
<html>
<?php require_once("../helpers/banco.php") ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ServiceWare</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/estilo.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>
<body class="container-fluid p-0 d-flex h-100">

    <!-- Menu lateral -->
    <div class="wrapper">     
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 inline-flex">
                <button class="btn mx-3" type="button btn-dark" data-bs-theme="dark">
                    <a href="../index.php">Voltar</a>
                </button>
                <button class="btn" type="button btn-dark mx-3" data-bs-theme="dark">
                    <a href="cadastroProdutoView.php">Cadastrar Produtos</a>
                </button>
            </nav>
            <main class="content px-3 ">
                <div class="container-fluid">
                <?php
                    $listaProdutos = [];
                    $sql = $pdo->query("SELECT * FROM produtos");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaProdutos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>

                <h1>Listagem de produtos</h1>
                <table class="table border table-dark table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($listaProdutos as $produto): ?>
                    <tr class="text-center">
                        <td class=><?php echo $produto['idProduto']?></td>
                        <td class=><?php echo $produto['nome']?></td>
                        <td><?php echo $produto['valor']?></td>
                        <td><?php echo $produto['quantidade']?></td>
                        <td><button class="btn" type="button btn-dark mx-3" data-bs-theme="dark"><a href="editarProdutoView.php?id<?$produto['idProduto']?>">Editar</a></button></td>
                        <td><button class="btn" type="button btn-dark mx-3" data-bs-theme="dark"><a href="deletarProduto.php?id<?$produto['idProduto']?>">Excluir</a></button></td>
                    </tr>

                    <?php endforeach; ?>
                </table>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    </header>
    
</body>