<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    private $produto;

    public function __construct($conn) {
        $this->produto = new Produto($conn);
    }

    public function buscarProduto($nome, $token) {
        $tokenValido = "secreto";

        if ($token !== $tokenValido) {
            http_response_code(403);
            return json_encode(["erro" => "Token inválido"]);
        }

        $dadosProduto = $this->produto->buscarPrecoPorNome($nome);
        if ($dadosProduto) {
            return json_encode([
                "preco" => $dadosProduto['preco'],
                "data_ultima_alteracao" => $dadosProduto['data_ultima_alteracao']
            ]);
        } else {
            http_response_code(404);
            return json_encode(["erro" => "Produto não encontrado"]);
        }
    }

    // Método para cadastrar um novo produto
    public function cadastrarProduto($nome, $preco) {
        $nome = trim($nome);
        $preco = floatval($preco);

        if (empty($nome) || $preco <= 0) {
            http_response_code(400);
            return json_encode(["erro" => "Nome e preço são obrigatórios"]);
        }

        // Tenta adicionar o produto no banco de dados
        $resultado = $this->produto->adicionarProduto($nome, $preco);
        if ($resultado) {
            return json_encode(["sucesso" => "Produto cadastrado com sucesso"]);
        } else {
            http_response_code(500);
            return json_encode(["erro" => "Erro ao cadastrar o produto"]);
        }
    }
}
