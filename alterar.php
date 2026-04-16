

<?php
include 'conexao.php';
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM clientes WHERE id=$id");
$row = $res->fetch_assoc();
?>

<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $row['id'] ?>">
<input type="text" name="nome" value="<?= $row['nome'] ?>">
<input type="email" name="email" value="<?= $row['email'] ?>">
<input type="text" name="senha" value="<?= $row['senha'] ?>">
<button>Atualizar</button>
</form>