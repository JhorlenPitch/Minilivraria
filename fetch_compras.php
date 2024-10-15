<?php
include_once 'conexao.php';

// Configura o cabeçalho para JSON
header('Content-Type: application/json');

// Buscar compras
$sql = "SELECT livro_id, nome_livro, valor_total, data_compra FROM compras";
$result = $conn->query($sql);

$compras = [];
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $compras[] = [
                'livro_id' => $row['livro_id'],
                'nome_livro' => $row['nome_livro'],
                'valor_total' => number_format($row['valor_total'], 2, ',', '.'), // Formata o valor
                'data_compra' => date('d/m/Y', strtotime($row['data_compra'])) // Formata a data
            ];
        }
    }
    // Retornar como JSON
    echo json_encode($compras);
} else {
    // Retornar erro de consulta
    http_response_code(500);
    echo json_encode(['error' => 'Erro na consulta ao banco de dados.']);
}

// Fecha a conexão
$conn->close();
