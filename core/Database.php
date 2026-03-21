<?php

class Database {

    private static $instance = null;

    public static function connect() {

        if (self::$instance === null) {

            $config = require BASE_PATH . '/config/Database.php';

            try {
                self::$instance = new PDO(
                    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                    $config['user'],
                    $config['pass']
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Erro DB: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}