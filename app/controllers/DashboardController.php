<?php

require_once __DIR__ . '/../middleware/AuthMiddleware.php';

class DashboardController
{
    public function index()
    {
        AuthMiddleware::handle(); // 🔥 proteção aqui

        require __DIR__ . '/../views/dashboard.php';
    }
}