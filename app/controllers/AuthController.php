<?php

require_once BASE_PATH . '/app/models/User.php';

class AuthController {

    public function login() {

        // Garante sessão
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Sanitiza entrada
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            header('Location: /login?error=1');
            exit;
        }

        $user = User::findByEmail($email);

        // Verifica senha
        if ($user && password_verify($password, $user['password'])) {

            // Proteção contra session fixation
            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'company_id' => $user['company_id'] ?? 1
            ];

            header('Location: /dashboard');
            exit;
        }

        header('Location: /login?error=1');
        exit;
    }

    public function logout() {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Limpa sessão completamente
        $_SESSION = [];

        // Remove cookie de sessão
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        header('Location: /login');
        exit;
    }
}