<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        .valor { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Relatório de Vendas</h2>

    <p><strong>Vendas:</strong> R$ {{ number_format($vendas[0]->total, 2, ',', '.') }}</p>
    <p><strong>Comissão:</strong> R$ {{ number_format($vendas[0]->total_comissao, 2, ',', '.') }}</p>
    <p><strong>Quantidade:</strong> {{ $vendas[0]->qnt }}</p>
</body>
</html>
