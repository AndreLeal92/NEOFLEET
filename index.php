<?php

require_once __DIR__ . '/core/Router.php';

$router = new Router();

// Rotas
$router->get('/', function() {
    echo "NeoFleet SaaS ONLINE agora já era 🚀";
});

$router->dispatch();