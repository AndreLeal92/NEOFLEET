<?php

// ============================
// CONFIGURAÇÃO
// ============================

// 🔒 produção → NÃO mostrar erros
// (em desenvolvimento pode ativar)
ini_set('display_errors', 0);
error_reporting(E_ALL);

// sessão global
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ============================
// AUTOLOAD SIMPLES
// ============================

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

// ============================
// INSTÂNCIAS
// ============================

$router = new Router();
$auth   = new AuthController();

// ============================
// FUNÇÃO DE PROTEÇÃO (middleware)
// ============================

function auth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login");
        exit;
    }
}

// ============================
// ROTAS PÚBLICAS
// ============================

// LOGIN
$router->get('/login', [$auth, 'loginForm']);
$router->post('/login', [$auth, 'login']);

// ============================
// ROTAS PROTEGIDAS
// ============================

// HOME (dashboard inicial)
$router->get('/', function() {

    auth(); // 🔒 protege

    echo "NeoFleet SaaS ONLINE 🚀";
});

// ============================
// DISPATCH
// ============================

$router->dispatch();