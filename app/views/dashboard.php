<?php session_start(); ?>

<h1>Dashboard</h1>

<p>Bem-vindo, <?php echo $_SESSION['user']['email']; ?></p>

<a href="/logout">Sair</a>