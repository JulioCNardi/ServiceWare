<header class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">

    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body px-0">

        <img class="logo" src="../img/logo.png">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li class="nav-item">
                <a href="Index.php" class="ms-3">
                    <i class="fs-5 bi-house-door-fill"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle ms-3" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fs-5 bi bi-clipboard2-plus-fill"></i><span class="ms-1 d-none d-sm-inline">Cadastro</span>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="consultaProduto.php">Produtos</a></li>
                    <li><a class="dropdown-item" href="consultaCliente.php">Clientes</a></li>
                    <li><a class="dropdown-item" href="consultaVeiculo.php">Veiculos</a></li>
                    <li><a class="dropdown-item" href="consultaOS.php">Ordem de Serviço</a></li>
                </ul>
            </li>
            <hr class="divider">
            <li class="nav-item">
                <a href="Index.php" class="ms-3">
                    <i class="fs-5 bi-person-fill"></i><span class="ms-1 d-none d-sm-inline">Gerar Relatório de OS</span>
                </a>
            </li>
            <hr class="divider">
            <li class="nav-item">
                <a href="Index.php" class="ms-3">
                    <i class="fs-5 bi-person-fill"></i><span class="ms-1 d-none d-sm-inline">Deslogar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="Index.php" class="ms-3">
                    <i class="fs-5 bi-lightbulb-fill"></i><span class="ms-1 d-none d-sm-inline">Ajuda</span>
                </a>
            </li>
        </ul>

    </div>
</header>