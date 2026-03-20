<?php
$basePath = dirname(__DIR__); // volta de /views para /app
?>

<?php require $basePath . '/views/layouts/header.php'; ?>
<?php require $basePath . '/views/layouts/sidebar.php'; ?>

<div class="content">

    <h1>Dashboard</h1>

    <p>Bem-vindo, <?= $_SESSION['user']['email'] ?></p>

    <hr>

    <div style="display:flex; gap:20px;">

        <div style="background:#f1f5f9; padding:20px; width:200px;">
            <h3>Veículos</h3>
            <p>0</p>
        </div>

        <div style="background:#f1f5f9; padding:20px; width:200px;">
            <h3>Motoristas</h3>
            <p>0</p>
        </div>

    </div>

</div>

<?php require $basePath . '/views/layouts/footer.php'; ?>