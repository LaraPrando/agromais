<?php
include 'conexao.php';

$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Controle de Estoque</title>
</head>
<body>
    <h2>Controle de Estoque</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["produto_nome"] . "</td><td>" . $row["quantidade"] . "</td><td>" . $row["preco"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum produto encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>