<?php

require_once BASE_PATH . '/core/Database.php';

class User {

    public static function findByEmail($email) {

        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}