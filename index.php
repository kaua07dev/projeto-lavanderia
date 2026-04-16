

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>Lavanderia Express</h1></header>

<section>
<h2>Login</h2>

<form action="validar_login.php" method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button>Entrar</button>
</form>

<p>Não tem conta?</p>
<a href="cadastro.php"><button>Cadastrar</button></a>

</section>
</body>
</html>