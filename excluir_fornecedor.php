<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM fornecedores WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Fornecedor excluído com sucesso!";
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>
<a href="listar_fornecedores.php">Voltar para lista de fornecedores</a>