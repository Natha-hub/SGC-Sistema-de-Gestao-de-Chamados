<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <title>Sistema de Chamados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">    

</head>

<body>

<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Sistema de Chamados</h2>

    <div>

        <a href="index.php?action=dashboard" class="btn btn-success">
            <i class="bi bi-bar-chart-fill"></i> Dashboard
        </a>

        <a href="index.php?action=novo" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Novo Chamado
        </a>

    </div>

</div>


<form method="GET" action="index.php" class="row mb-3">

    <div class="col-md-8">

        <input
            type="text"
            name="pesquisa"
            class="form-control"
            placeholder="Pesquisar por cliente">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">

            <i class="bi bi-search"></i>

            Pesquisar

        </button>

    </div>

    <div class="col-md-2">

        <a href="index.php" class="btn btn-secondary w-100">

            Limpar

        </a>

    </div>

</form>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>

<th>ID</th>
<th>Cliente</th>
<th>Cidade</th>
<th>Prioridade</th>
<th>Status</th>
<th>Data</th>
<th>Ações</th>

        </tr>

    </thead>

        <tbody>

        <?php if(count($chamados) > 0): ?>

            <?php foreach($chamados as $chamado): ?>

               <tr>

    <td><?= $chamado['id'] ?></td>
    <td><?= $chamado['cliente'] ?></td>
    <td><?= $chamado['cidade'] ?></td>
    <td><?= $chamado['prioridade'] ?></td>

    <td>
        

<?php if($chamado['status']=="Aberto"): ?>

<span class="badge bg-success">Aberto</span>

<?php elseif($chamado['status']=="Em andamento"): ?>

<span class="badge bg-warning text-dark">Em andamento</span>

<?php else: ?>

<span class="badge bg-danger">Finalizado</span>

<?php endif; ?>

</td>

<td><?= date('d/m/Y', strtotime($chamado['data_abertura'])) ?></td>

<td>

    <a href="index.php?action=editar&id=<?= $chamado['id'] ?>" class="btn btn-warning btn-sm">
        <i class="bi bi-pencil-square"></i> Editar
    </a>

    <a href="index.php?action=excluir&id=<?= $chamado['id'] ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Deseja excluir este chamado?')">
        <i class="bi bi-trash"></i> Excluir
    </a>

</td>

    
</tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="7" class="text-center">
                    Nenhum chamado cadastrado.
                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

</body>
</html>