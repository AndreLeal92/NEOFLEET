<?php

// ============================
// BASE PATH (CORRIGIDO)
// ============================

define('BASE_PATH', realpath(__DIR__ . '/../'));

// ============================
// CONFIG
// ============================

ini_set('display_errors', 1);
error_reporting(E_ALL);

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// ============================
// SESSION
// ============================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================
// LOAD CORE
// ============================

require_once BASE_PATH . '/core/Router.php';
require_once BASE_PATH . '/core/CSRF.php'; // ✅ AGORA FUNCIONA
require_once BASE_PATH . '/config/Database.php';

// ============================
// CSRF GLOBAL
// ============================

CSRF::validate();

// ============================
// CONTROLLERS
// ============================

require_once BASE_PATH . '/app/controllers/AuthController.php';
require_once BASE_PATH . '/app/controllers/DashboardController.php';

// ============================
// INSTANCES
// ============================

$router = new Router();
$auth = new AuthController();
$dashboard = new DashboardController();

// ============================
// MIDDLEWARE
// ============================

function auth()
{
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit;
    }
}

// ============================
// ROTAS
// ============================

$router->get('/login', [$auth, 'loginForm']);
$router->post('/login', [$auth, 'authenticate']);

$router->get('/logout', [$auth, 'logout']);

$router->get('/', function () {
    header("Location: /login");
    exit;
});

$router->get('/dashboard', function () use ($dashboard) {
    auth();
    $dashboard->index();
});

// ============================
// DISPATCH
// ============================

$router->dispatch();