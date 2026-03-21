<?php

require_once BASE_PATH . '/app/models/User.php';

class AuthController {

    public function login() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            header('Location: /?error=1');
            exit;
        }

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            // 🔥 sessão completa (multiempresa)
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'company_id' => $user['company_id']
            ];

            header('Location: /dashboard');
            exit;
        }

        header('Location: /?error=1');
        exit;
    }

    public function logout() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header('Location: /');
        exit;
    }
}