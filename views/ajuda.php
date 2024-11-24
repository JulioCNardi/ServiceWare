<!DOCTYPE html>
<html>
<?php include_once("helpers/banco.php"); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ServiceWare</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABG1Yw3pP9tLUMt8Lx4Z6E8t4l+zHlqZb6v4xXcwp0U1FzFqBpnB74P" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_menu.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>
<body class="container-fluid p-0 d-flex h-100">

    <!-- Menu lateral -->
    <div class="wrapper">
        <!-- Sidebar -->
        <?php require_once("menu.php")?>
        
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button btn-dark" data-bs-theme="dark">
                    <span>Menu</span>
                </button>
            </nav>
            <main class="content px-3 ">
                <div class="container-fluid">
                    <div class="ms-3 text-center">
                        <h2>Bem vindo ao sistema ServiceWare!</h2>
                        <img src="img/logo.png">
                        <p>
                            Um projeto de Programação II realizado pelos seguintes academicos:
                        </p>
                        <p>Alex Kophal Knecht, Gabriel Henrique, Jandir Basegio, Julio Cesar Nardi</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0W1B06sFohDqZgA9z6j6JYd2DkMZ7K2PqdX7uOhdL7a5llZJ" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>