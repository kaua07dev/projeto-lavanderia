

<?php
include 'conexao.php';

$id=$_POST['id'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$conn->query("UPDATE clientes SET nome='$nome',email='$email',senha='$senha' WHERE id=$id");

echo "✏️ Dados alterados com sucesso!<br>";
echo "<a href='painel.php'>Voltar</a>";
?>