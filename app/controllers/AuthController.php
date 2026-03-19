<?php

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'tenant_id' => $user['company_id']
            ];

            header("Location: /dashboard");
            exit;
        }

        echo "Login inválido";
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}