<?php
include_once 'conexao.php';

// Limpar todas as compras
$sql = "DELETE FROM compras";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

$conn->close();
?>