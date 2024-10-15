<?php
include_once 'conexao.php';

// Verifica se os dados foram enviados via POST
if (isset($_POST['livro_id']) && isset($_POST['nome_livro']) && isset($_POST['valor_total'])) {
    $livro_id = $_POST['livro_id'];
    $nome_livro = $_POST['nome_livro'];
    $valor_total = $_POST['valor_total'];

    // Insere a compra na tabela
    $sql = "INSERT INTO compras (livro_id, nome_livro, valor_total) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isd", $livro_id, $nome_livro, $valor_total);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar compra.']);
    }

    $stmt->close();
}
$conn->close();
?>