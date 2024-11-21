<!DOCTYPE html>
<html>
<?php require_once("../helpers/banco.php"); ?>
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
            <nav class="navbar navbar-expand px-3">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button btn-dark" data-bs-theme="dark">
                    <a href="../index.php">Voltar</a>
                </button>
            </nav>
            <main class="content px-3 ">
                <div class="container-fluid">
                    <?php
                        $produto = [];
                        $id = filter_input(INPUT_GET, 'produtoId',FILTER_VALIDATE_INT);
                        if ($id) {
                            $sql = $pdo->prepare("SELECT * FROM produtos where Idproduto = :produtoId");
                            $sql->bindValue(':produtoId', $id,PDO::PARAM_INT);
                            $sql->execute();

                            if($sql->rowCount() > 0) {
                               $produto = $sql->fetch(PDO::FETCH_ASSOC);

                            } else {
                                header("Location: consultaProdutoView.php");
                                exit;
                            }
                        }
                     
                    ?>

                <form action="../controllers/EditarProduto.php" method="POST">

                    <!-- Campo oculto para enviar o ID do produto -->
                    <input type="hidden" name="produtoId" value="<?= htmlspecialchars($id) ?>">

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome"  name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome'] ?? '') ?>">

                    <label for="valor">Valor:</label>
                    <input type="text" id="valor" name="valor" class="form-control" value="<?= htmlspecialchars($produto['valor'] ?? '') ?>">

                    <button type="submit">Editar</button>
                </form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    </header>
    
</body>