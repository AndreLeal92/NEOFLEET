<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

define('BASE_PATH', dirname(__DIR__));

// Router
require BASE_PATH . '/core/Router.php';

$router = new Router();

// Rotas
require BASE_PATH . '/routes/web.php';

// Executa
$router->dispatch($_SERVER['REQUEST_URI']);