<?php

class AuthMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // ❌ não logado
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        // 🔒 proteção contra sessão roubada (opcional)
        if (isset($_SESSION['ip']) && $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
            session_destroy();
            header("Location: /login");
            exit;
        }

        // 🔒 timeout (30 min)
        $timeout = 1800;

        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
            session_unset();
            session_destroy();
            header("Location: /login");
            exit;
        }

        $_SESSION['last_activity'] = time();
    }
}