<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/core/Router.php';

$router = new Router();

/* CARREGA ROTAS */
require BASE_PATH . '/routes/web.php';

/* PEGA URL */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

/* EXECUTA */
$router->dispatch($uri, $method);