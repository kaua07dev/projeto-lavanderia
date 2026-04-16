

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
    <title>Cadastro realizado</title>
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
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 350px;
        }

        .success {
            color: green;
            font-size: 20px;
            margin-bottom: 15px;
        }

        p {
            margin: 5px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="card">
    <div class="success">✅ Cadastro realizado com sucesso!</div>

    <p><b>Nome:</b> <?php echo $_SESSION['usuario']['nome']; ?></p>
    <p><b>Email:</b> <?php echo $_SESSION['usuario']['email']; ?></p>

    <a href="index.php">
        <button>Ir para login</button>
    </a>
</div>

</body>
</html>