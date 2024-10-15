function calcularFrete(livroNome, valorLivro, livroId) {
    var cep = document.getElementById('cep-' + livroId).value.trim();

    //Verifica se o CEP tem 8 dígitos numéricos
    if (cep.length === 8 && /^[0-9]{8}$/.test(cep)) {
        //Gera um valor de frete aleatório entre R$10 e R$50
        var valorFrete = (Math.random() * (50 - 10) + 10).toFixed(2);

        //Exibe o valor de frete para o usuário
        document.getElementById('frete-' + livroId).innerText = 'Frete estimado: R$' + valorFrete;

        //Calcula e exibe o valor total (frete + valor do livro)
        var valorTotal = parseFloat(valorLivro) + parseFloat(valorFrete);
        document.getElementById('valor-total-' + livroId).innerText = 'Valor total: R$' + valorTotal.toFixed(2);

        //Exibe o botão de finalizar compra
        document.getElementById('finalizar-' + livroId).style.display = 'inline-block';
    } else {
        alert("Por favor, insira um CEP válido com 8 dígitos numéricos.");
    }
}

function finalizarCompra(livroId, valorLivro) {
    var valorFrete = document.getElementById('frete-' + livroId).innerText.split('R$')[1];
    var valorTotal = parseFloat(valorLivro) + parseFloat(valorFrete);
    var nomeLivro = document.querySelector('#finalizar-' + livroId).parentElement.querySelector('h2').innerText;

    //Enviar os dados para o servidor para salvar a compra
    var formData = new FormData();
    formData.append('livro_id', livroId);
    formData.append('nome_livro', nomeLivro);
    formData.append('valor_total', valorTotal.toFixed(2));

    fetch('salvar_compra.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert("Compra finalizada com sucesso!\nValor total: R$" + valorTotal.toFixed(2) + "\nObrigado por comprar conosco!");
            window.location.reload(); //Recarregar a página após o alert
        } else {
            alert("Erro ao finalizar compra: " + data.message);
            window.location.reload(); //Recarregar a página após o alert
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert("Ocorreu um erro ao processar a compra.");
        window.location.reload(); //Recarregar a página após o alert
    });
}

//Função para buscar e limpar compras
document.getElementById('verCompras').addEventListener('click', function() {
    fetch('fetch_compras.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(compras => {
            const listaCompras = document.getElementById('listaCompras');
            const mensagemErro = document.getElementById('mensagemErro');
            const mensagemSucesso = document.getElementById('mensagemSucesso');
            
            //Limpa a lista antes de adicionar novas compras
            listaCompras.innerHTML = '';
            mensagemErro.style.display = 'none';
            mensagemSucesso.style.display = 'none';

            if (compras.length > 0) {
                compras.forEach(compra => {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${compra.nome_livro}</td><td>R$${parseFloat(compra.valor_total).toFixed(2)}</td><td>${compra.data_compra}</td>`;
                    listaCompras.appendChild(row);
                });
            } else {
                const row = document.createElement('tr');
                row.innerHTML = '<td colspan="3">Nenhuma compra encontrada.</td>';
                listaCompras.appendChild(row);
            }
        })
        .catch(error => {
            console.error('Erro ao buscar compras:', error);
            document.getElementById('mensagemErro').style.display = 'block';
        });
});

//Limpar compras
document.getElementById('limparCompras').addEventListener('click', function() {
    fetch('limpar_compras.php', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('mensagemSucesso').style.display = 'block';
            document.getElementById('listaCompras').innerHTML = '';
        } else {
            alert("Erro ao limpar compras: " + data.message);
        }
    })
    .catch(error => {
        console.error('Erro ao limpar compras:', error);
        alert("Ocorreu um erro ao tentar limpar as compras.");
    });
});
