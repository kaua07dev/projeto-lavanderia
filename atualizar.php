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

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['usuario'] = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha']
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizado</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        button {
            background: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>✅ Dados atualizados com sucesso!</h2>
    <a href="painel.php"><button>Voltar ao painel</button></a>
</div>

</body>
</html>