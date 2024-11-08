<?php
require_once __DIR__ . '/../../config/db_config.php';

class Produto {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function buscarPrecoPorNome($nomeProduto) {
        $nomeProdutoSeguro = $this->conn->real_escape_string($nomeProduto);
        $sql = "SELECT preco, data_ultima_alteracao FROM produtos WHERE nome = '$nomeProdutoSeguro'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    // Método para adicionar um novo produto
    public function adicionarProduto($nome, $preco) {
        $nomeSeguro = $this->conn->real_escape_string($nome);
        $sql = "INSERT INTO produtos (nome, preco, data_ultima_alteracao) VALUES ('$nomeSeguro', '$preco', NOW())";

        if ($this->conn->query($sql)) {
            return true;
        }
        return false;
    }
}
