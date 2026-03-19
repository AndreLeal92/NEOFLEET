<?php

require_once __DIR__ . '/../../config/Database.php';

class AuthController {

    public function loginForm() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function login() {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::getConnection();

        $stmt = $db->prepare("
            SELECT * FROM users 
            WHERE email = :email
            LIMIT 1
        ");

        $stmt->execute([
            ':email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            echo "Login inválido";
            return;
        }

        session_start();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['company_id'] = $user['company_id'];

        header("Location: /");
        exit;
    }
}