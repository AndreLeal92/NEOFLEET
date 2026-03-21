<?php

class AuthMiddleware {

    public static function check() {

        // Garante sessão iniciada
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Verifica autenticação
        if (empty($_SESSION['user'])) {

            // Evita cache de página protegida
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
            header('Pragma: no-cache');

            // Redireciona para login
            header('Location: /login');
            exit;
        }
    }
}