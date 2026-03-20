<?php
$basePath = dirname(__DIR__);
?>

<?php require $basePath . '/views/layouts/header.php'; ?>
<?php require $basePath . '/views/layouts/sidebar.php'; ?>

<div class="content">

    <h1 style="margin-bottom:10px;">Dashboard</h1>

    <p>Bem-vindo, <?= $_SESSION['user']['email'] ?></p>

    <hr style="margin:20px 0;">

    <style>

    /* GRID DOS CARDS */
    .dashboard-cards{
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
        gap:20px;
        margin-bottom:30px;
    }

    /* CARD */
    .card{
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:18px;
        border-radius:12px;
        color:#fff;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
        transition:0.2s;
    }

    .card:hover{
        transform:translateY(-3px);
    }

    /* CORES */
    .card.blue{ background:#3b82f6; }
    .card.green{ background:#10b981; }
    .card.orange{ background:#f59e0b; }
    .card.purple{ background:#8b5cf6; }
    .card.red{ background:#ef4444; }
    .card.dark{ background:#111827; }

    /* TEXTO */
    .card-info h3{
        margin:0;
        font-size:14px;
        opacity:0.9;
    }

    .card-info p{
        margin:5px 0 0;
        font-size:22px;
        font-weight:bold;
    }

    /* ÍCONE */
    .card-icon{
        font-size:28px;
    }

    /* GRÁFICOS */
    .charts{
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
    }

    .chart-box{
        background:#fff;
        padding:20px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,0.08);
    }

    @media(max-width:768px){
        .charts{
            grid-template-columns:1fr;
        }
    }

    </style>

    <!-- CARDS -->
    <div class="dashboard-cards">

        <div class="card blue">
            <div class="card-info">
                <h3>Veículos</h3>
                <p><?= isset($vehicles) ? $vehicles : 0 ?></p>
            </div>
            <div class="card-icon">🚚</div>
        </div>

        <div class="card green">
            <div class="card-info">
                <h3>Motoristas</h3>
                <p><?= isset($drivers) ? $drivers : 0 ?></p>
            </div>
            <div class="card-icon">👨‍✈️</div>
        </div>

        <div class="card orange">
            <div class="card-info">
                <h3>Abastecimentos</h3>
                <p><?= isset($fuel) ? $fuel : 0 ?></p>
            </div>
            <div class="card-icon">⛽</div>
        </div>

        <div class="card purple">
            <div class="card-info">
                <h3>Viagens</h3>
                <p><?= isset($trips) ? $trips : 0 ?></p>
            </div>
            <div class="card-icon">🛣️</div>
        </div>

        <div class="card red">
            <div class="card-info">
                <h3>Despesas</h3>
                <p><?= isset($expenses) ? $expenses : 0 ?></p>
            </div>
            <div class="card-icon">💰</div>
        </div>

        <div class="card dark">
            <div class="card-info">
                <h3>Custo por KM</h3>
                <p>
                    R$ <?= number_format(isset($realCost['cost_per_km']) ? $realCost['cost_per_km'] : 0, 2, ',', '.') ?>
                </p>
            </div>
            <div class="card-icon">📊</div>
        </div>

    </div>

    <!-- GRÁFICOS -->
    <div class="charts">

        <div class="chart-box">
            <h3>Viagens por mês</h3>
            <canvas id="tripChart"></canvas>
        </div>

        <div class="chart-box">
            <h3>Despesas</h3>
            <canvas id="expenseChart"></canvas>
        </div>

    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    new Chart(document.getElementById('tripChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Fev','Mar','Abr','Mai','Jun'],
            datasets: [{
                label: 'Viagens',
                data: [12,19,8,15,10,14]
            }]
        }
    });

    new Chart(document.getElementById('expenseChart'), {
        type: 'doughnut',
        data: {
            labels: ['Combustível','Pedágio','Manutenção'],
            datasets: [{
                data: [55,25,20]
            }]
        }
    });

});
</script>

<?php require $basePath . '/views/layouts/footer.php'; ?>