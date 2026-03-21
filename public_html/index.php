<?php

session_start();

// Caminho base do projeto
define('BASE_PATH', dirname(__DIR__));

// Autoload simples
require BASE_PATH . '/core/Router.php';

// Instancia router
$router = new Router();

// Importa rotas
require BASE_PATH . '/routes/web.php';

// Executa
$router->dispatch($_SERVER['REQUEST_URI']);