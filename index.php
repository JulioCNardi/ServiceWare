<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ServiceWare</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">ServiceWare</a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Tools & Components
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i>
                            Cadastro
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Clientes</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Produto</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Ordens
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Abertura de OS</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Consulta de OS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-header">
                        Administração
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                            aria-expanded="false" aria-controls="multi">
                            <i class="fa-solid fa-sliders pe-2"></i>
                            Configurações
                        </a>
                        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Alterar Senha</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Link 2</a>
                            </li>

                            
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Link 2</a>
                    </li>
                </ul>
            </div>
        </aside>
        
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
                    <div class="mb-3 text-center">
                        <h2>Bem vindo ao sistema ServiceWare!</h2>
                        <img src="img/logo.png">
                        <p>
                            Um projeto de Programação II realizado pelos seguintes academicos:
                        </p>
                        <p>Alex Kophal Knecht, Gabriel Henrique, Jandir Basegio, Julio Cesar Nardi</p>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    </header>
    
</body>
