<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
    exit;
}

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
        'total' => $total,
        'data' => date("Y-m-d H:i:s"),
        'status' => 'Lavando'
    ];
}

// calcular total geral
$totalGeral = 0;
foreach ($_SESSION['pedidos'] as $p) {
    $totalGeral += $p['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #4a6cf7, #6f8cff);
            margin: 0;
        }

        header {
            background: #2f4cd8;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .coluna {
            width: 45%;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            color: #2f4cd8;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        button {
            background: #4a6cf7;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #2f4cd8;
        }

        .pedido {
            background: #f1f5ff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
        }

        .excluir {
            background: red;
        }

        .status {
            font-weight: bold;
        }

        .total {
            margin-top: 15px;
            font-size: 18px;
            color: green;
        }
    </style>
</head>

<body>

<header>
    <h1>🧺 Lavanderia Express</h1>
</header>

<div class="container">

    <!-- 👤 USUÁRIO -->
    <div class="coluna">
        <h2>👤 Usuário</h2>

        <p><b>Nome:</b> <?php echo $_SESSION['usuario']['nome']; ?></p>
        <p><b>Email:</b> <?php echo $_SESSION['usuario']['email']; ?></p>

        <br>

        <a href="editar.php"><button>✏️ Editar</button></a>
        <a href="logout.php"><button>🚪 Sair</button></a>
    </div>

    <!-- 🧺 PEDIDOS -->
    <div class="coluna">
        <h2> Serviços</h2>

        <h3>📋 Preços</h3>
        <ul>
            <li>Roupa Comum: R$10/kg</li>
            <li>Roupa Pesada: R$15/kg</li>
            <li>Roupa Delicada: R$12/kg</li>
        </ul>

        <hr>

        <h3>➕ Novo Pedido</h3>

        <form method="POST">
            <input type="number" step="0.1" name="peso" placeholder="Peso (kg)" required>

            <select name="tipo">
                <option value="10">Camisa</option>
                <option value="15">Terno</option>
                <option value="12">Cobertor</option>
                <option value="8">Calça jeans</option>
                
            </select>

            <select name="pagamento" required>
    <option value="">Selecione</option>
    <option value="Pix">Pix</option>
    <option value="Débito">Cartão de Débito</option>
    <option value="Crédito">Cartão de Crédito</option>
    <option value="Dinheiro">Dinheiro</option>
</select>

            <button type="submit">Adicionar Pedido</button>
        </form>

        <hr>

        <h3>📦 Pedidos</h3>

        <?php
        if (empty($_SESSION['pedidos'])) {
            echo "<p>Nenhum pedido ainda.</p>";
        }

        foreach ($_SESSION['pedidos'] as $index => $pedido) {

            echo "<div class='pedido'>";
            echo "🧺 {$pedido['peso']} kg<br>";
            echo "💰 R$ " . number_format($pedido['total'], 2, ',', '.') . "<br>";
            echo "📅 " . date("d/m/Y H:i", strtotime($pedido['data'])) . "<br>";
            echo "<span class='status'>Status: {$pedido['status']}</span><br>";

            echo "<a href='excluir_pedido.php?id=$index'>
                    <button class='excluir'> Excluir</button>
                  </a>";

            echo "</div>";
        }

        echo "<div class='total'>💵 Total geral: R$ " . number_format($totalGeral, 2, ',', '.') . "</div>";
        ?>

    </div>

</div>

</body>
</html>
