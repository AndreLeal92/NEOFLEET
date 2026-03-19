<?php

// ============================
// CONFIGURAÇÃO
// ============================

// 🔒 produção → NÃO mostrar erros
ini_set('display_errors', 0);
error_reporting(E_ALL);

// ============================
// SESSÃO GLOBAL
// ============================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// segurança básica de sessão
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// ============================
// AUTOLOAD (MANUAL)
// ============================

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';

require_once __DIR__ . '/../config/Database.php';

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/DashboardController.php';

require_once __DIR__ . '/../app/models/User.php';

// ============================
// INSTÂNCIAS
// ============================

$router     = new Router();
$auth       = new AuthController();
$dashboard  = new DashboardController();

// ============================
// ROTAS PÚBLICAS
// ============================

// LOGIN
$router->get('/login', [$auth, 'loginForm']);
$router->post('/login', [$auth, 'authenticate']);

// LOGOUT
$router->get('/logout', [$auth, 'logout']);

// ============================
// ROTAS PROTEGIDAS
// ============================

// HOME → redireciona pro dashboard
$router->get('/', function () {
    header("Location: /dashboard");
    exit;
}, ['auth']);

// DASHBOARD (MVC CORRETO 🔥)
$router->get('/dashboard', [$dashboard, 'index'], ['auth', 'tenant']);

// ============================
// 404 (fallback)
// ============================

$router->get('/404', function () {
    http_response_code(404);
    echo "Página não encontrada";
});

// ============================
// DISPATCH
// ============================

$router->dispatch();