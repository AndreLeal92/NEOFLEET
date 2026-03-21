<?php

require_once BASE_PATH . '/app/models/User.php';

class AuthController {

    public function login() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'company_id' => $user['company_id'] ?? 1
            ];

            header('Location: /dashboard');
            exit;
        }

        header('Location: /?error=1');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}