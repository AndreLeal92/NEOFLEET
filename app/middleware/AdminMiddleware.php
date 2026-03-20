<?php

class AdminMiddleware
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

        // 🔒 não é admin
        if (empty($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] != 1) {

            // opção 1: redireciona
            header("Location: /dashboard");
            exit;

            // opção 2 (alternativa):
            // http_response_code(403);
            // echo "Acesso restrito.";
            // exit;
        }
    }
}