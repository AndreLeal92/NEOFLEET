<?php require __DIR__ . '/layouts/header.php'; ?>
<?php require __DIR__ . '/layouts/sidebar.php'; ?>

<div class="content" style="padding:30px; background:#f8fafc; min-height:100vh;">

    <h1 style="margin-bottom:10px;">Dashboard</h1>

    <p style="color:#64748b; margin-bottom:30px;">
        Bem-vindo, <strong><?= $_SESSION['user']['email'] ?></strong>
    </p>

    <!-- CARDS -->
    <div style="display:flex; gap:20px; flex-wrap:wrap;">

        <div style="background:#fff; padding:20px; width:220px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
            <h4 style="color:#64748b;">Veículos</h4>
            <h2 style="margin-top:10px;">0</h2>
        </div>

        <div style="background:#fff; padding:20px; width:220px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
            <h4 style="color:#64748b;">Motoristas</h4>
            <h2 style="margin-top:10px;">0</h2>
        </div>

        <div style="background:#fff; padding:20px; width:220px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
            <h4 style="color:#64748b;">Viagens</h4>
            <h2 style="margin-top:10px;">0</h2>
        </div>

        <div style="background:#fff; padding:20px; width:220px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
            <h4 style="color:#64748b;">Usuários</h4>
            <h2 style="margin-top:10px;">1</h2>
        </div>

    </div>

    <!-- SEÇÃO EXTRA -->
    <div style="margin-top:40px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.05);">
        <h3>Resumo do Sistema</h3>
        <p style="color:#64748b;">
            Aqui você poderá acompanhar métricas, atividades recentes e dados da sua frota.
        </p>
    </div>

</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>