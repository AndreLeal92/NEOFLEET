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
// AUTOLOAD SIMPLES
// ============================

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/models/User.php';

// ============================
// INSTÂNCIAS
// ============================

$router = new Router();
$auth   = new AuthController();

// ============================
// MIDDLEWARE (função simples)
// ============================

function auth()
{
    if (!isset($_SESSION['user'])) {
        header("Location: /login");
        exit;
    }
}

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

// HOME (root → redireciona pro dashboard)
$router->get('/', function () {

    auth();

    header("Location: /dashboard");
    exit;
});

// DASHBOARD
$router->get('/dashboard', function () {

    auth();

    $user = $_SESSION['user'];

    echo "<h1>Dashboard</h1>";
    echo "<p>Bem-vindo, {$user['email']}</p>";
    echo "<p>Tenant: " . ($user['tenant_id'] ?? 'N/A') . "</p>";
    echo "<br>";
    echo "<a href='/logout'>Sair</a>";
});

// ============================
// FALLBACK (rota não encontrada)
// ============================

$router->get('/404', function () {
    http_response_code(404);
    echo "Página não encontrada";
});

// ============================
// DISPATCH
// ============================

$router->dispatch();