<?php

class TenantMiddleware
{
    public static function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 🔒 usuário não logado
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        // 🔒 tenant não definido
        if (empty($_SESSION['user']['tenant_id'])) {
            session_destroy();
            header("Location: /login");
            exit;
        }

        // (opcional) valida tipo
        if (!is_numeric($_SESSION['user']['tenant_id'])) {
            session_destroy();
            header("Location: /login");
            exit;
        }
    }
}