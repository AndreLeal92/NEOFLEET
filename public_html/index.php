<?php

require_once __DIR__ . '/../core/Router.php';

// AJUSTE CRÍTICO
$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/public_html', '', $uri);

if ($uri === '') {
    $uri = '/';
}

$_SERVER['REQUEST_URI'] = $uri;

$router = new Router();

$router->get('/', function() {
    echo "NeoFleet SaaS ONLINE 🚀";
});

$router->dispatch();