<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NeoFleet - Login</title>

<link rel="stylesheet" href="/assets/css/login.css">

</head>

<body>

<h1>Login</h1>

<?php if (!empty($_GET['error'])): ?>
    <p style="color:red;">Email ou senha inválidos</p>
<?php endif; ?>

<form method="POST" action="/login">

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Senha" required>
    <br><br>

    <button type="submit">Entrar</button>

</form>

</body>
</html>