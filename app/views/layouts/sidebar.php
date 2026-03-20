<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <div class="toggle-btn" onclick="toggleSidebar()">☰</div>

    <div class="sidebar-top">
        <h2 class="logo text">NeoFleet</h2>
        <hr>

        <nav>

            <!-- DASHBOARD -->
            <a href="/dashboard" class="<?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>">
                <span class="text">Dashboard</span>
            </a>

            <!-- OPERAÇÃO -->
            <div class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Operação</span>
                    <span class="arrow">▶</span>
                </a>
                <div class="dropdown-menu">
                    <a href="#">Nova Viagem</a>
                    <a href="#">Lançamento Despesas da Viagem</a>
                    <a href="#">Relação de Viagens</a>
                </div>
            </div>

            <!-- FROTA -->
            <div class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Frota</span>
                    <span class="arrow">▶</span>
                </a>
                <div class="dropdown-menu">
                    <a href="/vehicles/create">Cadastrar Veículos</a>
                    <a href="#">Atrelar Cavalo & Carreta</a>
                    <a href="/vehicles">Relação de Veículos</a>
                    <a href="#">Despesas Fixas</a>
                </div>
            </div>

            <!-- MOTORISTAS -->
            <div class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Motoristas</span>
                    <span class="arrow">▶</span>
                </a>
                <div class="dropdown-menu">
                    <a href="/drivers/create">Cadastrar</a>
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
                    <a href="/fuel">Histórico de Abastecimentos</a>
                </div>
            </div>

            <!-- USUÁRIOS -->
            <div class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Usuários</span>
                    <span class="arrow">▶</span>
                </a>
                <div class="dropdown-menu">
                    <a href="#">Cadastrar Novo Usuário</a>
                    <a href="#">Lista de usuários</a>
                </div>
            </div>

        </nav>
    </div>

    <!-- LOGOUT -->
    <div class="sidebar-bottom">
        <hr>
        <a href="/logout" class="logout">
            <span class="text">Sair</span>
        </a>
    </div>

</div>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>