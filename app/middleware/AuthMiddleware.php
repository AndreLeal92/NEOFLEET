<?php

class AuthMiddleware {

    public static function check() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }
}