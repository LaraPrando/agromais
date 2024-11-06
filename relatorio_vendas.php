<?php
include 'conexao.php';

$sql = "SELECT * FROM vendas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Vendas</title>
</head>
<body>
    <h2>Relatório de Vendas</h2>
    <table border="1">
        <tr>
            <th>ID da Venda</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Total</th>
        </tr>
        <?php
        $total_geral = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["data"] . "</td><td>" . $row["cliente_nome"] . "</td><td>" . $row["total"] . "</td></tr>";
                $total_geral += $row["total"];
            }
        } else {
            echo "<tr><td colspan='4'>Nenhuma venda encontrada</td></tr>";
        }
        ?>
        <tr>
            <td colspan="3"><strong>Total Geral</strong></td>
            <td><strong><?php echo $total_geral; ?></strong></td>
        </tr>
    </table>
</body>
</html>

<?php
$conn->close();
?>