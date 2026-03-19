<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

// AJUSTE CRÍTICO (mantém por enquanto)
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/public_html', '', $uri);

if ($uri === '') {
    $uri = '/';
}

$_SERVER['REQUEST_URI'] = $uri;

$router = new Router();

$auth = new AuthController();

// HOME
$router->get('/', function() {
    echo "NeoFleet SaaS ONLINE 🚀";
});

// LOGIN (tela)
$router->get('/login', [$auth, 'loginForm']);

// LOGIN (ação)
$router->post('/login', [$auth, 'login']);

$router->dispatch();