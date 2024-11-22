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
                    $listaProdutos = [];
                    $sql = $pdo->query("SELECT * FROM produtos");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaProdutos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>

                <?php
                    $listaClientes = [];
                    $sql = $pdo->query("SELECT * FROM clientes");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaClientes = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>

                <?php
                    $listaVeiculos = [];
                    $sql = $pdo->query("SELECT * FROM veiculos");

                    if ($sql->rowCount() > 0) 
                    {
                        $listaVeiculos = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                ?>

                <form action="../controllers/CadastrarOrdem.php" method="POST">

                    <label for="DataAbertura">Date de abertura:</label>
                    <input type="date" id="DataAbertura" name="DataAbertura" required>


                    <select class="form-control" id="idCliente" name="idCliente" required>
                        <option value=""> Selecione o cliente</option>
                        <?php foreach($listaProdutos as $produto): ?>
                            <option value=<?php echo $cliente['idCliente']?>>  <?php echo $cliente['nome']?>></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-control" id="idVeiculo" name="idVeiculo" required>
                        <option value=""> Selecione a Placa do veiculo</option>
                        <?php foreach($listaProdutos as $produto): ?>
                            <option value=<?php echo $veiculo['idVeiculo']?>><?php echo $veiculo['placa']?>></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <label for="observacao">Observação:</label>
                    <input type="text" id="observacao" name="observacao">

                    <label for="valorvenda">Valor do item:</label>
                    <input type="text" id="valorvenda" name="valorvenda">
                    

                    <button type="submit">Cadastrar</button>
                </form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    </header>
    
</body>