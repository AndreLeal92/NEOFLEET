<?php

class TenantMiddleware
{
    public static function handle()
    {
        if (!isset($_SESSION['user']['company_id'])) {
            echo "Empresa não identificada.";
            exit;
        }
    }
}