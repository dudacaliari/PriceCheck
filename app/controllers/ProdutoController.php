<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    private $produto;

    public function __construct($conn) {
        $this->produto = new Produto($conn);
    }

    public function buscarProduto($nome, $token) {
        // Token de autenticação
        $tokenValido = "secreto";

        // Verificação do token
        if ($token !== $tokenValido) {
            http_response_code(403); // Código de erro 403 (token inválido)
            return json_encode(["erro" => "Token inválido"]);
        }

        // Realizando a consulta no banco de dados
        $dadosProduto = $this->produto->buscarPrecoPorNome($nome);

        if ($dadosProduto) {
            return json_encode([
                "preco" => $dadosProduto['preco'],
                "data_ultima_alteracao" => $dadosProduto['data_ultima_alteracao']
            ]);
        } else {
            http_response_code(404); // Produto não encontrado
            return json_encode(["erro" => "Produto não encontrado"]);
        }
    }
}
