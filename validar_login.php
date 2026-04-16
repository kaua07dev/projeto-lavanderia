

<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

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