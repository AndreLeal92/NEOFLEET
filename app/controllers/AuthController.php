<?php

class AuthController
{
    public function loginForm()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        // 🔒 evita erro se sessão não iniciou
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'tenant_id' => $user['company_id']
            ];

            // 🔥 SEMPRE antes de qualquer echo
            header("Location: /dashboard");
            exit;
        }

        // 🔥 melhor prática: redirecionar com erro
        $_SESSION['error'] = "Login inválido";
        header("Location: /login");
        exit;
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        header("Location: /login");
        exit;
    }
}