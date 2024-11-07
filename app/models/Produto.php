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
}
