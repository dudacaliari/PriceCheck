<?php
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../app/controllers/ProdutoController.php';

// Parâmetros da requisição
$nome = $_GET['nome'] ?? null;
$token = $_GET['token'] ?? null;

$controller = new ProdutoController($conn);
$response = $controller->buscarProduto($nome, $token);

// Retornar a resposta da API em JSON
echo $response;
?>
