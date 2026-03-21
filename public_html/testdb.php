<?php

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/core/Database.php';

$pdo = Database::connect();

echo "✅ BANCO CONECTADO";