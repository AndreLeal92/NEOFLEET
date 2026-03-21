<?php

class AuthMiddleware {

    public static function check() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // ❌ usuário não logado
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }

        // ❌ sessão inválida (segurança extra)
        if (
            empty($_SESSION['user']['id']) ||
            empty($_SESSION['user']['company_id'])
        ) {
            session_destroy();
            header('Location: /');
            exit;
        }
    }
}