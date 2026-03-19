<?php

// ============================
// CONFIGURAÇÃO
// ============================

// 🔥 CONFIGURA ANTES DA SESSÃO
ini_set('display_errors', 1);
error_reporting(E_ALL);

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// ============================
// SESSÃO
// ============================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}