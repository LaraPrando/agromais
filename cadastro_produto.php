<?php
include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade_em_estoque = $_POST['quantidade_em_estoque'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_em_estoque) VALUES ('$nome', '$descricao', $preco, $quantidade_em_estoque)";
   
    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>
    <form action="cadastrar_produto.php" method="post">
        Nome: <input type="text" name="nome" required><br>
        Descrição: <textarea name="descricao"></textarea><br>
        Preço: <input type="number" step="0.01" name="preco" required><br>
        Quantidade em Estoque: <input type="number" name="quantidade_em_estoque" required><br>
        <input type="submit" value="Cadastrar Produto">
    </form>
</body>
</html>




    

