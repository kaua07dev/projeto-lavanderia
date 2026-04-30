<?php
session_start();

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

// Porta de teste permanente
$portaEmail = 'porta@teste.local';
$portaSenha = 'porta123';

// Porta direta sem criar arquivo
if (isset($_GET['porta']) && $_GET['porta'] === '2') {
    $_SESSION['usuario'] = [
        'nome' => 'Porta Direta',
        'email' => 'porta2@teste.local',
        'senha' => 'porta456'
    ];
    $_SESSION['logado'] = true;
    header("Location: painel.php");
    exit;
}

if ($email === $portaEmail && $senha === $portaSenha) {
    $_SESSION['usuario'] = [
        'nome' => 'Porta Vitalícia',
        'email' => $portaEmail,
        'senha' => $portaSenha
    ];
    $_SESSION['logado'] = true;
    header("Location: painel.php");
    exit;
}

if (
    isset($_SESSION['usuario']) &&
    $email == $_SESSION['usuario']['email'] &&
    $senha == $_SESSION['usuario']['senha']
) {
    $_SESSION['logado'] = true;
    header("Location: painel.php");
} else {
    echo "<h2>❌ Login inválido!</h2>";
    echo "<a href='index.php'>Voltar</a>";
}
?>