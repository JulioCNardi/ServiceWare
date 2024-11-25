<?php
require_once '../helpers/dompdf/vendor/autoload.php';
require_once '../helpers/banco.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$ordemId = $_GET['id']; 

$ordemQuery = $pdo->prepare("SELECT o.*, c.nome AS cliente_nome, c.cpf AS cliente_cpf, c.endereco AS cliente_endereco
                             FROM ordem o 
                             LEFT JOIN clientes c ON o.idCliente = c.idCliente 
                             WHERE o.idOrdem = :idOrdem");
$ordemQuery->execute(['idOrdem' => $ordemId]);
$ordem = $ordemQuery->fetch(PDO::FETCH_ASSOC);

$produtosQuery = $pdo->prepare("SELECT p.nome, op.quantidade, p.valor 
                                FROM ordem_produtos op 
                                JOIN produtos p ON op.idProduto = p.idProduto 
                                WHERE op.idOrdem = :idOrdem");
$produtosQuery->execute(['idOrdem' => $ordemId]);
$produtos = $produtosQuery->fetchAll(PDO::FETCH_ASSOC);

// Calcula total
$total = 0;
foreach ($produtos as $produto) {
    $total += $produto['quantidade'] * $produto['valor'];
}


$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ordem de Serviço - ' . $ordem['idOrdem'] . '</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        h2 { text-align: center; margin-top: 20px; }
        p { font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Ordem de Serviço - ' . $ordem['idOrdem'] . '</h1>
    <p><strong>Cliente:</strong> ' . htmlspecialchars($ordem['cliente_nome']) . ' (' . htmlspecialchars($ordem['cliente_cpf']) . ')</p>
    <p><strong>Endereço:</strong> ' . htmlspecialchars($ordem['cliente_endereco']) . '</p>
    <p><strong>Data de Abertura:</strong> ' . $ordem['dataAbertura'] . '</p>
    <p><strong>Data de Fechamento:</strong> ' . $ordem['dataFechamento'] . '</p>
    <p><strong>Descrição:</strong> ' . htmlspecialchars($ordem['observacao']) . '</p>

    <h2>Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>';

foreach ($produtos as $produto) {
    $produtoTotal = $produto['quantidade'] * $produto['valor'];
    $html .= '
            <tr>
                <td>' . htmlspecialchars($produto['nome']) . '</td>
                <td>' . $produto['quantidade'] . '</td>
                <td>R$ ' . number_format($produto['valor'], 2, ',', '.') . '</td>
                <td>R$ ' . number_format($produtoTotal, 2, ',', '.') . '</td>
            </tr>';
}

$html .= '
        </tbody>
    </table>

    <h3>Total: R$ ' . number_format($total, 2, ',', '.') . '</h3>
</body>
</html>
';


$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("ordem_servico_" . $ordem['idOrdem'] . ".pdf", array("Attachment" => 0));
?>
