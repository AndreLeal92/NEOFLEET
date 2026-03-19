<?php

require_once __DIR__ . '/../../config/Database.php';

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        // pega dados do form
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // validação básica
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Preencha todos os campos";
            header("Location: /login");
            exit;
        }

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

        // valida usuário
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Email ou senha inválidos";
            header("Location: /login");
            exit;
        }

        // 🔐 LOGIN OK
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'tenant_id' => $user['tenant_id'] ?? $user['company_id'] ?? null
        ];

        header("Location: /dashboard");
        exit;
    }

    public function logout()
    {
        // limpa sessão
        $_SESSION = [];

        // destrói sessão
        session_destroy();

        header("Location: /login");
        exit;
    }
}