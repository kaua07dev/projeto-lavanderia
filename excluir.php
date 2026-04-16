
<?php
include 'conexao.php';

$id=$_GET['id'];

$conn->query("DELETE FROM clientes WHERE id=$id");

echo "❌ Dado excluído com sucesso!<br>";
echo "<a href='painel.php'>Voltar</a>";
?>