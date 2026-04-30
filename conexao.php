<?php
$conn = new mysqli("localhost", "root", "", "lavanderia");
$conn->query("SET time_zone = '-03:00'");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>