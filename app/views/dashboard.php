<?php die("CHEGOU NA VIEW CORRETA"); ?>


<?php require __DIR__ . '/layouts/header.php'; ?>
<?php require __DIR__ . '/layouts/sidebar.php'; ?>

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

<?php require __DIR__ . '/layouts/footer.php'; ?>