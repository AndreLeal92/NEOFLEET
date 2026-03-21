<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<h1>Dashboard</h1>

<p>Logado como: <?= $_SESSION['user']['email'] ?></p>

<a href="/logout">Sair</a>