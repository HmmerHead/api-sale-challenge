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

    <p><strong>Valor da Comissão:</strong> R$ {{ number_format($vendasComissao[0]->total, 2, ',', '.') }}</p>
</body>
</html>
