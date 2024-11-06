<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO fornecedores (nome, endereco, telefone, email) VALUES ('$nome', '$endereco', '$telefone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Fornecedor cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Fornecedor</title>
</head>
<body>
    <h2>Cadastro de Fornecedor</h2>
    <form method="post" action="">
        Nome: <input type="text" name="nome" required><br>
        Endereço: <input type="text" name="endereco" required><br>
        Telefone: <input type="text" name="telefone" required><br>
        Email: <input type="email" name="email" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>