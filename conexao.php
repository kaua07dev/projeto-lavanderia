

<?php
$conn = new mysqli("localhost", "root", "", "lavanderia");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>