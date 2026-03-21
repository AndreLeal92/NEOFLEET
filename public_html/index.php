<?php

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/core/Router.php';
require BASE_PATH . '/routes/web.php';

$router = new Router();

// pega a URL
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// roda o router
$router->dispatch($uri, $method);