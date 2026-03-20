<div class="sidebar">

    <div>
        <h2 class="logo">NeoFleet</h2>

        <hr>

        <nav>
            <a href="/dashboard" class="<?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>">
                📊 Dashboard
            </a>

            <a href="/vehicles" class="<?= $_SERVER['REQUEST_URI'] == '/vehicles' ? 'active' : '' ?>">
                🚚 Veículos
            </a>
        </nav>
    </div>

    <div>
        <hr>
        <a href="/logout" class="logout">🚪 Sair</a>
    </div>

</div>