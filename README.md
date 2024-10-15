# 📚 Mini Livraria - Sistema de Gerenciamento de Livros
## Este projeto é um sistema simples de livraria online, desenvolvido em PHP e MySQL, que permite gerenciar livros e realizar compras com cálculo de frete.

### 🚀 Configuração
#### 1. Pré-requisitos<br/>
Certifique-se de que tem um servidor local instalado, como o WAMPESERVER (Iremos usar) [Baixe aqui](https://sourceforge.net/projects/wampserver/).<br/>
Baixe o WAMPESERVER ou utilize outro servidor de sua preferencia, como XAMPP ou LAMP.<br/>

#### 2. Instalação do WAMPESERVER<br/>
Após instalar o WAMPESERVER, acesse _C:/wamp64/www/_.<br/>
Clone este repositório dentro da pasta www:<br/>
_git clone https://github.com/seu-usuario/minilivraria.git<br/>_

#### 3. Iniciar o Servidor<br/>
Inicie o WAMPESERVER e aguarde o ícone no canto inferior direito ficar verde 🟢.<br/>

#### 4. Configuração do Banco de Dados<br/>
Acesse o PhpMyAdmin (ícone do WAMPESERVER > PhpMyAdmin > PhpMyAdmin x.x.x).<br/>

##### No primeiro acesso, use:<br/>

Usuário: root<br/>
Senha: (deixe em branco)<br/>

##### Crie um novo banco de dados chamado:<br/>
_CREATE DATABASE minilivraria;<br/><br/>_
Selecione o banco criado, vá para SQL e cole o [Script Sql](https://docs.google.com/document/d/1G7yLGBYf2eEt22k0FWbv9nC9ykV4LW41qo__cWe_Bng/edit?tab=t.0) necessário aqui para criar as tabelas e cadastrar livros automaticamente.<br/>

#### 5. Executando o Projeto<br/>
Abra o navegador e acesse: _http://localhost/minilivraria.<br/>_
#### 🛠️ Funcionalidades<br/>
##### 📦 Calcular frete: Informe seu endereço para obter o valor do frete.<br/>
##### 🛒 Finalizar compra: Adicione livros ao carrinho e conclua a compra com frete calculado.<br/>
##### 📋 Visualizar compras: Consulte todas as compras realizadas.<br/>
##### ❌ Excluir compras: Remova compras da lista se necessário.<br/>
##### 📖 Gerenciamento de livros: Adicione, edite ou exclua livros cadastrados.<br/>

#### 🔧 Tecnologias Utilizadas<br/>
##### PHP
##### MySQL
##### HTML/CSS
##### JavaScript
