<?php

class CSRF
{
    public static function generate()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public static function input()
    {
        return '<input type="hidden" name="csrf" value="'.self::generate().'">';
    }

    public static function validate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (
                empty($_POST['csrf']) ||
                empty($_SESSION['csrf_token']) ||
                !hash_equals($_SESSION['csrf_token'], $_POST['csrf'])
            ) {
                http_response_code(403);
                die('CSRF inválido');
            }
        }
    }

    public static function regenerate()
    {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}