<?php
// Configurações de conexão com o banco de dados
$servername = "localhost"; // Nome do servidor
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$database = "minilivraria"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
//echo "Conexão bem-sucedida";

// Você pode opcionalmente definir o conjunto de caracteres para evitar problemas de exibição de caracteres especiais
// mysqli_set_charset($conn, "utf8");
?>
