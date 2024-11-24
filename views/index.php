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
        <div class="conteudo col-10 bg-light row">
            <div class="col-6 text-center">
                <h2 class="display-5">Bem vindo ao ServiceWare!</h2>
                <br>
                <p>
                    Seu serviço essencial, para cadastro de ordens de serviço voltado a mêcanica automotivas, para começar acione o botão no canto superior direito.
                </p>
                <br>
                <br>
                <br>
                <br>
                <p>
                    Um projeto de Programação II realizado pelos seguintes academicos:
                </p>
                <br>
                <br>
                <ul>
                    <li>Alex Kophal Knecht</li>
                    <br>
                    <li>Gabriel Henrique da Silva</li>
                    <br>
                    <li>Jandir Basegio</li>
                    <br>
                    <li>Julio Cesar Nardi</li>
                </ul>
                
            </div>
            <div class="col-6 text-center">
                <img src="../img/logo.png">
            </div>
        </div>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>