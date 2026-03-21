<?php

require_once BASE_PATH . '/app/controllers/AuthController.php';
require_once BASE_PATH . '/app/middleware/AuthMiddleware.php';

$auth = new AuthController();

$router->get('/', function() {
    require BASE_PATH . '/public_html/login.php';
});

$router->post('/login', [$auth, 'login']);

$router->get('/logout', [$auth, 'logout']);

$router->get('/dashboard', function() {

    AuthMiddleware::check();

    require BASE_PATH . '/app/views/dashboard.php';
});