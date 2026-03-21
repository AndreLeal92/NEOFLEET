<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<h1>Login</h1>

<?php if (!empty($_GET['error'])): ?>
    <p style="color:red;">Email ou senha inválidos</p>
<?php endif; ?>

<form method="POST" action="/login">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Senha" required><br><br>
    <button>Entrar</button>
</form>