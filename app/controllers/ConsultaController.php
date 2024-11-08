<?php
require_once __DIR__ . '/../../config/db_config.php';
require_once __DIR__ . '/../../app/controllers/ProdutoController.php';

// Parâmetros de requisição
$nome = $_GET['nome'] ?? null;
$token = "secreto"; // Token fixo no servidor (não expondo para o front-end)

if ($nome === null || $nome === '') {
    echo json_encode(["erro" => "Nome do produto não informado"]);
    exit();
}

// Instanciando o controller
$controller = new ProdutoController($conn);

// Chamando a função para buscar o produto
$response = $controller->buscarProduto($nome, $token);

// Retornar a resposta da API em JSON
echo $response;
