<div class="sidebar" id="sidebar">

        <h2 class="logo text">NeoFleet</h2>

        <hr>

        <nav>

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
                    <a href="/vehicles">Cadastrar Veículos</a>
                </div>

                 <div class="dropdown-menu">
                    <a href="/vehicles">Relação Veículos</a>
                </div>
                
            </div>

            <!-- 🔽 MOTORISTAS -->
            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    <span class="text">Cadastrar Motoristas</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/drivers">Lista de Motoristas</a>
                </div>

            <!-- ABASTECIMENTOS -->
            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                     <span class="text">Abastecimentos</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/drivers">Novo Abastecimento</a>
                </div>









            </div>

        </nav>
    </div>

    <div>
        <hr>
        <a href="/logout">
            <span class="text">Sair</span>
        </a>
    </div>

</div>

<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>