<?php

require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function loginForm() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function login() {

        session_start();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            echo "Usuário não encontrado";
            return;
        }

        if (!password_verify($password, $user['password'])) {
            echo "Senha inválida";
            return;
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['company_id'] = $user['company_id'];

        header("Location: /");
        exit;
    }
}