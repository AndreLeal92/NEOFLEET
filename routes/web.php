<?php

require_once BASE_PATH . '/app/controllers/AuthController.php';
require_once BASE_PATH . '/app/middleware/AuthMiddleware.php';

$auth = new AuthController();

/* HOME */
$router->get('/', function() {
    require BASE_PATH . '/public_html/login.php';
});

/* LOGIN (GET = tela) */
$router->get('/login', function() {
    require BASE_PATH . '/public_html/login.php';
});

/* LOGIN (POST = processa) */
$router->post('/login', [$auth, 'login']);

/* LOGOUT */
$router->get('/logout', [$auth, 'logout']);

/* DASHBOARD */
$router->get('/dashboard', function() {
    AuthMiddleware::check();
    require BASE_PATH . '/app/views/dashboard.php';
});