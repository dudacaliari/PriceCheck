<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "pricedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
