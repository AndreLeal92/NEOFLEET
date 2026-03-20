<div class="sidebar" id="sidebar">

    <div class="toggle-btn" onclick="toggleSidebar()">☰</div>

    <div>
        <h2 class="logo text">NeoFleet</h2>

        <hr>

        <nav>

            <a href="/dashboard" class="<?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>">
                📊 <span class="text">Dashboard</span>
            </a>

            <div class="dropdown">

                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                    🚚 <span class="text">Frota</span>
                    <span class="arrow">▶</span>
                </a>
                <div class="dropdown-menu">
                    <a href="/vehicles">Veículos</a>
                </div>
                
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">
                     <span class="text">Motoristas</span>
                    <span class="arrow">▶</span>
                </a>

                <div class="dropdown-menu">
                    <a href="/drivers">Motoristas</a>
                </div>

            </div>

        </nav>
    </div>

    <div>
        <hr>
        <a href="/logout">
            🚪 <span class="text">Sair</span>
        </a>
    </div>

</div>

<!-- OVERLAY MOBILE -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>