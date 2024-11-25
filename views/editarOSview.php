<?php 
require_once("../helpers/banco.php");

$ordem = [];
$produtosOrdem = [];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    // Recuperar dados da ordem
    $sql = $pdo->prepare("SELECT * FROM ordem WHERE idOrdem = :ordemId");
    $sql->bindValue(':ordemId', $id, PDO::PARAM_INT);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $ordem = $sql->fetch(PDO::FETCH_ASSOC); 
    } else {
        header("Location: consultaOrdem.php");
        exit;
    }

    // select produtos  ordem
    $sqlProdutos = $pdo->prepare("
        SELECT op.idProduto, p.nome, op.quantidade 
        FROM ordem_produtos op
        JOIN produtos p ON op.idProduto = p.idProduto
        WHERE op.idOrdem = :ordemId
    ");
    $sqlProdutos->bindValue(':ordemId', $id, PDO::PARAM_INT);
    $sqlProdutos->execute();
    $produtosOrdem = $sqlProdutos->fetchAll(PDO::FETCH_ASSOC);
    
    // SELECT dos produtos cadastrados
    $sqlTodosProdutos = $pdo->prepare("SELECT * FROM produtos");
    $sqlTodosProdutos->execute();
    $produtosCadastrados = $sqlTodosProdutos->fetchAll(PDO::FETCH_ASSOC);
}
?>

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

    <style>
        .form-container {
            margin-top: 2rem;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .input-group-text {
            min-width: 150px;
        }

        .input-group .form-control {
            flex: 1;
        }

        .product-row {
            margin-bottom: 1rem;
        }

        .btn-primary {
            margin-top: 1rem;
            width: 100%;
        }
    </style>
</head>

<body>

<?php include("menu.php") ?>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="form-container">
                <h2 class="text-center">Editar Ordem</h2>
                <form action="../controllers/EditarOS.php" method="POST">
                    <input type="hidden" name="idOrdem" value="<?= $id ?>">

                    <div class="mb-3">
                        <label for="dataAbertura" class="form-label">Data de Abertura</label>
                        <input type="date" class="form-control" name="dataAbertura" required value="<?= $ordem['dataAbertura'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="dataFechamento" class="form-label">Data de Fechamento</label>
                        <input type="date" class="form-control" name="dataFechamento" required value="<?= $ordem['dataFechamento'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="observacao" class="form-label">Observação</label>
                        <textarea class="form-control" name="observacao" rows="3"><?= $ordem['observacao'] ?></textarea>
                    </div>

                    <!-- Produtos -->
                    <div id="produtosContainer">
                        <?php foreach ($produtosOrdem as $produto): ?>
                            <div class="product-row mb-3">
                                <div class="input-group">
                                    <select name="produtos[]" class="form-select" required>
                                        <option value="">Selecione um produto</option>
                                        <?php foreach ($produtosCadastrados as $prod): ?>
                                            <option value="<?= $prod['idProduto'] ?>" <?= $prod['idProduto'] == $produto['idProduto'] ? 'selected' : '' ?>><?= $prod['nome'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="number" name="quantidade[]" class="form-control" placeholder="Quantidade" required value="<?= $produto['quantidade'] ?>" min="1">
                                    <button type="button" class="btn btn-danger" onclick="removerProduto(this)">Remover</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Botão para adicionar novos produtos -->
                    <button type="button" class="btn btn-secondary" onclick="adicionarProduto()">Adicionar Produto</button>

                    <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function adicionarProduto() {
    const container = document.getElementById('produtosContainer');
    const newRow = document.createElement('div');
    newRow.className = 'product-row mb-3';
    newRow.innerHTML = `
        <div class="input-group">
            <select name="produtos[]" class="form-select" required>
                <option value="">Selecione um produto</option>
                <?php foreach ($produtosCadastrados as $prod): ?>
                    <option value="<?= $prod['idProduto'] ?>"><?= $prod['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="quantidade[]" class="form-control" placeholder="Quantidade" required min="1">
            <button type="button" class="btn btn-danger" onclick="removerProduto(this)">Remover</button>
        </div>
    `;
    container.appendChild(newRow);
    }

    function removerProduto(button) {
        button.parentElement.parentElement.remove();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>