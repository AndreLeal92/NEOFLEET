<?php

class AdminMiddleware
{
    public static function handle()
    {
        if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] != 1) {
            echo "Acesso restrito.";
            exit;
        }
    }
}