<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="bi bi-bar-chart-fill"></i>
            Dashboard
        </h2>

        <a href="index.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Voltar
        </a>

    </div>

    <div class="row mb-4">

    <div class="col-md-3">

        <div class="card bg-primary text-white text-center">

            <div class="card-body">

                <h5>Total</h5>

                <h2><?= $totais['total'] ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-success text-white text-center">

            <div class="card-body">

                <h5>Abertos</h5>

                <h2><?= $totais['abertos'] ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning text-center">

            <div class="card-body">

                <h5>Em andamento</h5>

                <h2><?= $totais['andamento'] ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white text-center">

            <div class="card-body">

                <h5>Finalizados</h5>

                <h2><?= $totais['finalizados'] ?></h2>

            </div>

        </div>

    </div>

</div>

    <canvas id="grafico"></canvas>

</div>

<script>

const dados = {

    labels: [

        <?php foreach($dados as $d): ?>

            '<?= $d['status'] ?>',

        <?php endforeach; ?>

    ],

    datasets: [{
   label: 'Chamados',

    data: [

        <?php foreach($dados as $d): ?>

            <?= $d['total'] ?>,

        <?php endforeach; ?>

    ],

    backgroundColor: [

        '#198754',
        '#ffc107',
        '#dc3545'

    ]

}]

};

new Chart(document.getElementById('grafico'),{

    type:'pie',

    data:dados

});

</script>

</body>
</html>