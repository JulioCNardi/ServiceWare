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
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body class="container-fluid p-0 d-flex h-100">

    <!-- Menu lateral -->
    <header id="MenuLateralSidebar" class=".d-flex flex-column flex-shrink-0 p-3 text-white offcanvas-md offcanvas-start">
    
    <img src="img/logo.jpg" alt="logo do sistema">
    
    <a href="#" class="navbar-brand"> </a><hr>
            <ul class="mynav nav nav-pills flex-column mb-auto">

                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-user"></i>
                        Cadastro de cliente
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-user"></i>
                        Cadastro de produto/serviço
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-user"></i>
                        Cadastro de ordem
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-bookmark"></i>
                        Pesquisar Ordens
                        <span class="notification-badge">5</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-newspaper"></i>
                        Relatórios
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-solid fa-archway"></i>
                        Institutions
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Organizations
                    </a>
                </li>

                <li class="sidebar-item  nav-item mb-1">
                    <a href="#" 
                       class="sidebar-link collapsed" 
                       data-bs-toggle="collapse"
                       data-bs-target="#settings"
                       aria-expanded="false"
                       aria-controls="settings">
                        <i class="fas fa-cog pe-2"></i>
                        <span class="topic">Settings </span>
                    </a>
                    <ul id="settings" 
                        class="sidebar-dropdown list-unstyled collapse" 
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-in-alt pe-2"></i>
                                <span class="topic"> Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-user-plus pe-2"></i>
                                <span class="topic">Register</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-out-alt pe-2"></i>
                                <span class="topic">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <hr>
            <div class="d-flex">

                <i class="fa-solid fa-book  me-2"></i>
                <span>
                    <h6 class="mt-1 mb-0">
                          Geeks for Geeks Learning Portal
                      </h6>
                </span>
            </div>
    </header>
    <!-- Container conteudo da pagina -->
    <main>
        
    </main>
    <footer>

    </footer>
</body>