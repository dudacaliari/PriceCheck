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
            return json_encode(["erro" => "Produto não encontrado"]);
        }
    }
}
