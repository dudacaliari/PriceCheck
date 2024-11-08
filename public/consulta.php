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
    <h1>Consulta de Preço do Produto</h1>
    <label for="produto">Nome do Produto:</label>
    <input type="text" id="produto" name="produto">
    <button id="buscar">Buscar</button>
    <div id="resultado"></div>

    <!-- Formulário para adicionar um novo produto -->
    <h2>Cadastrar Novo Produto</h2>
    <form id="formCadastroProduto">
        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" name="nomeProduto" required>
        
        <label for="precoProduto">Preço do Produto:</label>
        <input type="number" id="precoProduto" name="precoProduto" required>
        
        <button type="submit">Cadastrar Produto</button>
    </form>
</body>
</html>
