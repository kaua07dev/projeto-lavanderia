painel.php

<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}

// cria lista de pedidos se não existir
if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [];
}

// adicionar pedido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['peso'])) {
    $peso = $_POST['peso'];
    $preco = $_POST['tipo'];
    $total = $peso * $preco;

    $_SESSION['pedidos'][] = [
        'peso' => $peso,
        'preco' => $preco,
        'total' => $total
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .coluna {
            width: 40%;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .pedido {
            background: #eee;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
        }

        .excluir {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<header>
    <h1>Lavanderia Express</h1>
</header>

<div class="container">

    <!-- 🟦 COLUNA 1 -->
    <div class="coluna">
        <h2>👤 Usuário</h2>

        <p><b>Nome:</b> <?php echo $_SESSION['usuario']['nome']; ?></p>
        <p><b>Email:</b> <?php echo $_SESSION['usuario']['email']; ?></p>

        <br>

        <a href="editar.php"><button>Editar Dados</button></a><br><br>
        <a href="logout.php"><button>Sair</button></a>
    </div>

    <!-- 🟩 COLUNA 2 -->
    <div class="coluna">
        <h2>🧺 Serviços da Lavanderia</h2>

        <h3>📋 Tabela de Preços</h3>
        <ul>
            <li>👕 Comum: R$10/kg</li>
            <li>🧥 Pesada: R$15/kg</li>
            <li>👗 Delicada: R$12/kg</li>
        </ul>

        <hr>

        <h3>➕ Novo Pedido</h3>

        <form method="POST">
            <input type="number" step="0.1" name="peso" placeholder="Peso (kg)" required>

            <select name="tipo">
                <option value="10">Comum</option>
                <option value="15">Pesada</option>
                <option value="12">Delicada</option>
            </select>

            <button type="submit">Adicionar</button>
        </form>

        <hr>

        <h3>📦 Meus Pedidos</h3>

        <?php
        if (empty($_SESSION['pedidos'])) {
            echo "<p>Nenhum pedido ainda.</p>";
        }

        foreach ($_SESSION['pedidos'] as $index => $pedido) {
            echo "<div class='pedido'>";
            echo "Peso: {$pedido['peso']} kg<br>";
            echo "Total: R$ " . number_format($pedido['total'], 2, ',', '.') . "<br>";

            echo "<a href='excluir_pedido.php?id=$index'>
                    <button class='excluir'>Excluir</button>
                  </a>";

            echo "</div>";
        }
        ?>
    </div>

</div>

</body>
</html>