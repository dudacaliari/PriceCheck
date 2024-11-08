<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta e Cadastro de Produto</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Consulta de Preço do Produto</h1>
        <div class="form-group">
            <label for="produto">Nome do Produto:</label>
            <input type="text" id="produto" name="produto" placeholder="Digite o nome do produto">
        </div>
        <div class="form-group">
            <button id="buscar">Buscar</button>
        </div>
        <div id="resultado" class="result-box">
            <!-- Os dados do produto ou erro serão exibidos aqui -->
        </div>

        <!-- Formulário para adicionar um novo produto -->
        <h2>Cadastrar Novo Produto</h2>
        <form id="formCadastroProduto">
            <div class="form-group">
                <label for="nomeProduto">Nome do Produto:</label>
                <input type="text" id="nomeProduto" name="nomeProduto" required placeholder="Nome do produto">
            </div>

            <div class="form-group">
                <label for="precoProduto">Preço do Produto:</label>
                <input type="number" id="precoProduto" name="precoProduto" required placeholder="Preço do produto">
            </div>

            <div class="form-group">
                <button type="submit">Cadastrar Produto</button>
            </div>
        </form>
    </div>
</body>
</html>
