<?php

class Database {

    private static $instance;

    public static function connect() {

        if (!self::$instance) {

            $config = require BASE_PATH . '/config/Database.php';

            self::$instance = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                $config['user'],
                $config['pass']
            );

            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}