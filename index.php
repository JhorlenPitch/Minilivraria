<?php
include_once 'conexao.php';

//Consulta para obter os livros
$sql = "SELECT id, nome, descricao, valor, imagem FROM livro";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Livraria</title>
</head>
<body>
    <div class="navbar">
        <h3>Livraria Online</h3>
        <a href="#" data-toggle="modal" data-target="#comprasModal" id="verCompras">Ver Compras</a>
    </div>

    <div class="box-principal">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    //Exibição de cada livro
                    echo '<div class="livro-card" data-id="' . $row['id'] . '">';
                    echo '<img src="' . $row['imagem'] . '" alt="' . $row['nome'] . '">';
                    echo "<h2>" . $row['nome'] . "</h2>";
                    echo "<p>" . $row['descricao'] . "</p>";
                    echo '<p class="preco">Preço: R$' . number_format($row['valor'], 2, ',', '.') . '</p>';

                    //Input e botão para cálculo de frete
                    echo '<div class="calcular-frete">';
                    echo '<input type="text" id="cep-' . $row['id'] . '" name="cep" placeholder="Digite seu CEP" maxlength="8">';
                    echo '<button type="button" onclick="calcularFrete(\'' . $row['nome'] . '\', ' . $row['valor'] . ', ' . $row['id'] . ')">Calcular Frete</button>';
                    echo '</div>';

                    //Resultados do cálculo de frete
                    echo '<br><div id="frete-' . $row['id'] . '" class="frete-result"></div>';
                    echo '<div id="valor-total-' . $row['id'] . '" class="valor-total"></div>';

                    //Botão finalizar
                    echo '<button type="button" id="finalizar-' . $row['id'] . '" class="finalizar-compra" style="display:none;" onclick="finalizarCompra(' . $row['id'] . ', ' . $row['valor'] . ')">Finalizar Compra</button>';
                    echo "</div>"; //fechamento de livro-card
                }
            } else {
                echo "<p>Nenhum livro encontrado.</p>";
            }
            ?>
        </div>
    </div>

    <footer>
        &copy; Jhorlen Bianor
    </footer>

    <!-- Modal para compras -->
    <div class="modal fade" id="comprasModal" tabindex="-1" aria-labelledby="comprasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comprasModalLabel">Lista de Compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome do Livro</th>
                                <th>Valor Total</th>
                                <th>Data da Compra</th>
                            </tr>
                        </thead>
                        <tbody id="listaCompras">
                            <!-- As compras serão adicionadas aqui -->
                        </tbody>
                    </table>
                    <div id="mensagemErro" style="display: none; color: red;">Erro ao carregar as compras.</div>
                    <div id="mensagemSucesso" style="display: none; color: green;">Compras limpas com sucesso!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" id="limparCompras">Limpar Compras</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Incluindo o arquivo JavaScript externo -->
    <script src="script.js"></script>

</body>
</html>

<?php
$conn->close();
?>
