<div class="sidebar" id="sidebar">

    <!-- BOTÃO -->
    <div class="toggle-btn" onclick="toggleSidebar()">☰</div>

    <div>
        <h2 class="logo text">NeoFleet</h2>

        <hr>

        <nav>

            <!-- DASHBOARD -->
            <a href="/dashboard" class="<?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>">
                <span class="text">Dashboard</span>
            </a>

            <!-- FROTA -->
            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Frota</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/vehicles/create">Cadastrar Veículos</a>
                    <a href="/vehicles">Relação de Veículos</a>
                </div>

            </div>

            <!-- MOTORISTAS -->
            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Motoristas</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/drivers/create">Cadastrar Motorista</a>
                    <a href="/drivers">Lista de Motoristas</a>
                </div>

            </div>

            <!-- ABASTECIMENTOS -->
            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Abastecimentos</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/fuel/create">Novo Abastecimento</a>
                    <a href="/fuel">Histórico</a>
                </div>

            </div>

        </nav>
    </div>

    <!-- LOGOUT -->
    <div>
        <hr>
        <a href="/logout">
            <span class="text">Sair</span>
        </a>
    </div>

</div>

<!-- OVERLAY MOBILE -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>