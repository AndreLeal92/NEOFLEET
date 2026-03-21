```php
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NeoFleet - Login</title>

<link rel="icon" type="image/png" href="/assets/images/world.png">

<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<link rel="stylesheet" href="/assets/css/login.css">

</head>

<body>

<div class="login-wrapper">

    <div class="logo">
        <img src="/assets/images/Neofleet.png" alt="NeoFleet">
    </div>

    <main class="container">

        <!-- MENSAGEM DE ERRO -->
        <?php if(isset($_GET['error'])): ?>
            <p style="color:#ff4d4d; text-align:center; margin-bottom:10px;">
                Email ou senha inválidos
            </p>
        <?php endif; ?>

        <form method="POST" action="/login">

            <h1>Login</h1>

            <div class="input-box">
                <input type="email" name="email" placeholder="Usuário" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input 
                    type="password"
                    name="password"
                    placeholder="Senha"
                    required
                    id="password"
                >
                <i class='bx bx-hide' id="togglePassword"></i>
            </div>

            <div class="Remember-forgot">
                <label>
                    <input type="checkbox" name="remember"> Lembrar minha senha
                </label>
                <a href="#">Esqueceu sua senha?</a>
            </div>

            <button type="submit">Login</button>

        </form>

    </main>

</div>

<script>

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function () {

    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';

    password.setAttribute('type', type);

    this.classList.toggle('bx-show');
    this.classList.toggle('bx-hide');

});

</script>

</body>
</html>
```
