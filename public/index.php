<?php
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../app/controllers/ProdutoController.php';

// Parâmetros da requisição
$nome = $_GET['nome'] ?? null;
$token = $_GET['token'] ?? null;

$controller = new ProdutoController($conn);

// Verificar se é uma requisição POST para cadastro de produto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $_POST['nomeProduto'] ?? null;
    $precoProduto = $_POST['precoProduto'] ?? null;

    $response = $controller->cadastrarProduto($nomeProduto, $precoProduto);

    // Retornar a resposta da API em JSON
    echo $response;
    exit;
}

// Se for uma requisição GET, processa a busca do produto
$response = $controller->buscarProduto($nome, $token);

// Retornar a resposta da API em JSON
echo $response;
