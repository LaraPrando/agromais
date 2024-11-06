<?php
include 'conexao.php';

// Consultas rápidas para obter dados de resumo
$clientes = $conn->query("SELECT COUNT(*) AS total FROM clientes")->fetch_assoc()['total'];
$fornecedores = $conn->query("SELECT COUNT(*) AS total FROM fornecedores")->fetch_assoc()['total'];
$produtos_baixo_estoque = $conn->query("SELECT COUNT(*) AS total FROM estoque WHERE quantidade < 10")->fetch_assoc()['total'];
$vendas_total = $conn->query("SELECT SUM(total) AS total FROM vendas")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - AgroMais</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .summary { display: flex; justify-content: space-between; padding: 20px; }
        .summary div { background: #f4f4f4; padding: 15px; border-radius: 8px; text-align: center; width: 22%; }
        .summary div h3 { margin: 0; font-size: 24px; color: #333; }
        .summary div p { margin: 5px 0 0; font-size: 18px; color: #777; }
        .link { display: block; margin-top: 20px; text-align: center; }
        .link a { text-decoration: none; color: #009688; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h1>Bem-vindo ao Sistema AgroMais</h1>
    <h3>Visão Geral</h3>
    <div class="summary">
        <div>
            <h3><?php echo $clientes; ?></h3>
            <p>Clientes</p>
        </div>
        <div>
            <h3><?php echo $fornecedores; ?></h3>
            <p>Fornecedores</p>
        </div>
        <div>
            <h3><?php echo $produtos_baixo_estoque; ?></h3>
            <p>Produtos com Estoque Baixo</p>
        </div>
        <div>
            <h3>R$ <?php echo number_format($vendas_total, 2, ',', '.'); ?></h3>
            <p>Total de Vendas</p>
        </div>
    </div>

    <div class="link">
        <a href="cadastro_cliente.php">Gerenciar Clientes</a> |
        <a href="cadastro_fornecedor.php">Gerenciar Fornecedores</a> |
        <a href="controle_estoque.php">Controle de Estoque</a> |
        <a href="relatorio_vendas.php">Relatórios Financeiros</a> |
        <a href="cadastro_produto.php">Produtos</a>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>