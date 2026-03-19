<?php

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {

            $host   = "localhost";
            $dbname = "and28477_neofleet";
            $user   = "and28477_neofleet_user";
            $pass   = "UAubbe(2V1*ZGR.hfF";

            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

            try {
                self::$connection = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {

                if (ini_get('display_errors')) {
                    die("Erro na conexão: " . $e->getMessage());
                } else {
                    die("Erro ao conectar ao banco de dados.");
                }
            }
        }

        return self::$connection;
    }
}