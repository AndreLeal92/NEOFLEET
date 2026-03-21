<?php

$router->get('/', function() {
    require BASE_PATH . '/public_html/login.php';
});

$router->post('/login', function() {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === 'admin@teste.com' && $password === '123456') {
        $_SESSION['user'] = $email;
        header('Location: /dashboard');
        exit;
    }

    header('Location: /?error=1');
    exit;
});

$router->get('/dashboard', function() {

    if (!isset($_SESSION['user'])) {
        header('Location: /');
        exit;
    }

    echo "LOGADO COM SUCESSO 🚀";
});