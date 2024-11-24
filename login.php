<?php
$usuarioCorreto = "admin";
$senhaCorreta = "12345";  

// Variáveis para capturar mensagens de erro ou sucesso
$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Validação do login
    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {
        // Se o login for bem-sucedido
        header("Location: views/index.php");
    } else {
        // Se o login falhar
        $mensagemErro = "Usuário ou senha incorretos. Tente novamente.";
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
    <link rel="stylesheet" href="/css/login.css">
    

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<main class="container-fluid">
        <div class="conteudo col-12 row">
        <div class="login-container">
    <h2>Login</h2>
                <form method="POST" action="">
                    <div class="input-group">
                        <label for="usuario">Usuário:</label>
                        <input type="text" id="usuario" name="usuario" required>
                    </div>
                    <div class="input-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
