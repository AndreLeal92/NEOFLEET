<?php

class Database {

    public static function getConnection() {

        $host = "localhost";
        $dbname = "and28477_neofleet";
        $user = "SEU_USUARIO_CPANEL";
        $pass = "SUA_SENHA";

        return new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}