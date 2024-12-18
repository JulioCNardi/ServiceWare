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

        <?php
            $produto = [];
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if ($id) 
            {
                $sql = $pdo->prepare("SELECT * FROM produtos where Idproduto = :produtoId");
                $sql->bindValue(':produtoId', $id,PDO::PARAM_INT);
                $sql->execute();

                if($sql->rowCount() > 0) {
                    $produto = $sql->fetch(PDO::FETCH_ASSOC);
                } else {
                        header("Location: consultaProduto.php");
                        exit;
                }
            }
        ?>
        

            <div class="col-4 text-center bg-light rounded">
                <h2 class="h3">Edição de Produtos:</h2>
                <form class="text-center" action="../controllers/EditarProduto.php" method="POST">
                    <input type="hidden" name="produtoId" value="<?=$produto['idProduto']?>" />
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?=$produto['nome']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor de Venda do Produto</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="<?=$produto['valor']?>" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                    </form>
            </div>
            <div class="col-8 text-center">
                <?php
                    $listaProdutos = [];
                    $sql = $pdo->query("SELECT * FROM produtos");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaProdutos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>
                    <table class="table border table-dark table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>


                        <?php foreach($listaProdutos as $produto): ?>
                        <tr class="text-center">
                            <td class=><?php echo $produto['idProduto']?></td>
                            <td class=><?php echo $produto['nome']?></td>
                            <td><?php echo $produto['valor']?></td>
                            <td><button class="btn btn-warning mx-3" type="button" data-bs-theme="dark"><a href="editarProdutoView.php?id=<?=$produto['idProduto']?>">Editar</a></button></td>
                            <td><button class="btn bg-danger mx-3" type="button " data-bs-theme="dark"><a href="../controllers/DeletarProduto.php?id=<?=$produto['idProduto']?>">Excluir</a></button></td>
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