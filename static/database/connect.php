<?php 
$conn = new mysqli("localhost", "root", "root", "db");

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>