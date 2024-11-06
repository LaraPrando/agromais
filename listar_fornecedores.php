<?php
include 'conexao.php';

$sql = "SELECT * FROM fornecedores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Fornecedores</title>
</head>
<body>
    <h2>Lista de Fornecedores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["endereco"] . "</td><td>" . $row["telefone"] . "</td><td>" . $row["email"] . "</td>";
                echo "<td><a href='editar_fornecedor.php?id=".$row["id"]."'>Editar</a> | <a href='excluir_fornecedor.php?id=".$row["id"]."'>Excluir</a></td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum fornecedor encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
