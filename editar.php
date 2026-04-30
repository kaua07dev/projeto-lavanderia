<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Dados</title>
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
            width: 350px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        input {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            width: 100%;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>✏️ Editar Dados</h2>

    <form action="atualizar.php" method="POST">
        <input type="text" name="nome" value="<?php echo $_SESSION['usuario']['nome']; ?>" required>
        <input type="email" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>" required>
        <input type="password" name="senha" placeholder="Nova senha" required>

        <button type="submit">Atualizar</button>
    </form>
</div>

</body>
</html>