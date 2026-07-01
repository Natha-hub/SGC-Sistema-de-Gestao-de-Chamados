<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-tools"></i>

        Chamados

    </h2>

    <a
    href="index.php?modulo=chamados&action=novo"
    class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Novo Chamado

    </a>

</div>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Cliente</th>
<th>Equipe</th>
<th>Tipo</th>
<th>Prioridade</th>
<th>Status</th>
<th>SLA</th>
<th>SLA Cumprido</th>
<th>Abertura</th>
<th width="190">Ações</th>

</tr>

</thead>

<tbody>

<?php if(count($chamados)>0): ?>

<?php foreach($chamados as $chamado): ?>

<tr>

<td><?= $chamado['id'] ?></td>

<td><?= $chamado['cliente'] ?></td>

<td><?= $chamado['equipe'] ?? '-' ?></td>

<td><?= $chamado['tipo'] ?></td>

<td><?= $chamado['prioridade'] ?></td>

<td>

<?php

switch($chamado['status'])
{

case "Aberto":

echo '<span class="badge bg-success">Aberto</span>';

break;

case "Em Atendimento":

echo '<span class="badge bg-warning text-dark">Em Atendimento</span>';

break;

default:

echo '<span class="badge bg-danger">Finalizado</span>';

}

?>

</td>

<td>

<?= gmdate("i:s", $chamado['prazo_segundos']) ?>

</td>

<td>

<?php

if($chamado['status'] != 'Finalizado')
{

    echo '<span class="badge bg-secondary">Em andamento</span>';

}
else
{

    $tempo = strtotime($chamado['data_encerramento']) - strtotime($chamado['data_abertura']);

    if($tempo <= $chamado['prazo_segundos'])
    {

        echo '<span class="badge bg-success">Sim</span>';

    }
    else
    {

        echo '<span class="badge bg-danger">Não</span>';

    }

}

?>

</td>

<td>

<?= date('d/m/Y H:i:s', strtotime($chamado['data_abertura'])) ?>

</td>

<td>

<a
href="index.php?modulo=chamados&action=editar&id=<?= $chamado['id'] ?>"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a
href="index.php?modulo=chamados&action=excluir&id=<?= $chamado['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Excluir chamado?')">

<i class="bi bi-trash"></i>

</a>

<a href="index.php?modulo=chamados&action=finalizar&id=<?= $chamado['id'] ?>"
   class="btn btn-success btn-sm"
   onclick="return confirm('Deseja finalizar este chamado?')">

    <i class="bi bi-check-lg"></i>

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

<?php require "../app/views/layout/footer.php"; ?>