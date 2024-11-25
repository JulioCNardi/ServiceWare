<?php require_once("../helpers/banco.php") ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ServiceWare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
                <i class="bi bi-arrow-right-square-fill fs-3"></i>
            </button>
        </div>
        <div class="conteudo col-10 row">
            <h2 class="h1 text-center">Ordem de Serviço</h2>
            <div class="col-12">

                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Cadastrar Ordem de Serviço
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <h2 class="h3">Cadastro de Ordem:</h2>
                        <br>
                        <form class="text-center" action="../controllers/CadastrarOS.php" method="POST">
                            <div class="input-group mb-3">
                                <label for="nome" class="form-label">Data de abertura e fechamento da Ordem</label>
                                <input type="date" class="form-control" name="dataAbertura" required>
                                <input type="date" class="form-control" name="dataFechamento" required>
                            </div>
                            <div class="mb-3">
                                <label for="idCliente" class="form-label">Cliente</label>
                                <select name="idCliente" class="form-select" required>
                                    <option value="">Selecione um cliente</option>
                                    <?php
                                    $clientes = $pdo->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($clientes as $cliente) {
                                        echo "<option value='{$cliente['idCliente']}'>{$cliente['nome']} ({$cliente['cpf']})</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="nome" class="form-label">Descrição da ordem</label>
                            <textarea class="form-control mb-3" placeholder="Descrição" name="observacao" required></textarea>

                            <div class="mb-3">
                                <label for="produtos" class="form-label">Produtos</label>
                                <select name="produtos[]" class="form-select" multiple required>
                                    <?php
                                    $produtos = $pdo->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($produtos as $produto) {
                                        echo "<option value='{$produto['idProduto']}'>{$produto['nome']} - R$ {$produto['valor']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" name="quantidade[]" class="form-control" min="1" placeholder="Quantidade" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-5">
                <?php
                $listaOrdem = $pdo->query("
                    SELECT o.*, c.nome AS cliente_nome, c.cpf AS cliente_cpf 
                    FROM ordem o 
                    LEFT JOIN clientes c ON o.idCliente = c.idCliente 
                    ORDER BY o.idOrdem DESC
                ")->fetchAll(PDO::FETCH_ASSOC);

                foreach ($listaOrdem as $key => $ordem) {
                    $stmt = $pdo->prepare("
                        SELECT p.nome, op.quantidade, p.valor 
                        FROM ordem_produtos op 
                        JOIN produtos p ON op.idProduto = p.idProduto 
                        WHERE op.idOrdem = ? 
                    ");
                    $stmt->execute([$ordem['idOrdem']]);
                    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $total = 0;
                    foreach ($produtos as $produto) {
                        $total += $produto['quantidade'] * $produto['valor'];
                    }

                    $listaOrdem[$key]['produtos'] = $produtos;
                    $listaOrdem[$key]['total'] = $total;
                }
                ?>
                <table class="table border table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID Ordem</th>
                            <th>Cliente</th>
                            <th>Data Abertura</th>
                            <th>Data Fechamento</th>
                            <th>Descrição</th>
                            <th>Produtos</th>
                            <th>Total</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                            <th>Gerar PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaOrdem as $ordem): ?>
                        <tr class="text-center">
                            <td><?= htmlspecialchars($ordem['idOrdem']) ?></td>
                            <td><?= htmlspecialchars("{$ordem['cliente_nome']} ({$ordem['cliente_cpf']})") ?></td>
                            <td><?= htmlspecialchars($ordem['dataAbertura']) ?></td>
                            <td><?= htmlspecialchars($ordem['dataFechamento']) ?></td>
                            <td><?= htmlspecialchars($ordem['observacao']) ?></td>
                            <td>
                                <?php if (!empty($ordem['produtos'])): ?>
                                    <?php foreach ($ordem['produtos'] as $produto): ?>
                                        <div>
                                            <?= htmlspecialchars("{$produto['nome']} ({$produto['quantidade']}x) - R$ " . number_format($produto['valor'], 2, ',', '.')) ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <em>Sem produtos vinculados</em>
                                <?php endif; ?>
                            </td>
                            <td>R$ <?= number_format($ordem['total'], 2, ',', '.') ?></td>
                            <td>
                                <a class="btn btn-warning text-white" href="editarOSView.php?id=<?= $ordem['idOrdem'] ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger text-white" href="../controllers/DeletarOrdem.php?id=<?= $ordem['idOrdem'] ?>">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success text-white" href="gerar_pdf.php?id=<?= $ordem['idOrdem'] ?>">
                                    <i class="bi bi-file-earmark-pdf"></i> Gerar PDF
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
