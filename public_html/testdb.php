<?php

require __DIR__ . '/../core/Database.php';

$pdo = Database::connect();

echo "✅ BANCO CONECTADO";