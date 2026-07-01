<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-pencil-square"></i>

    Editar Chamado

</h2>

<form action="index.php?modulo=chamados&action=atualizar" method="POST">

<input
type="hidden"
name="id"
value="<?= $chamado['id'] ?>">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Cliente</label>

        <select
            name="cliente_id"
            class="form-select"
            required>

            <?php foreach($clientes as $cliente): ?>

                <option
                    value="<?= $cliente['id'] ?>"

                    <?= $cliente['id']==$chamado['cliente_id'] ? 'selected' : '' ?>>

                    <?= $cliente['nome'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="col-md-3 mb-3">

        <label>Tipo</label>

        <select
            name="tipo"
            class="form-select">

<?php

$tipos = [

"Sem conexão",
"Lentidão",
"Instalação",
"Mudança",
"Upgrade",
"Retirada",
"Outro"

];

foreach($tipos as $tipo)
{

?>

<option

<?= $tipo==$chamado['tipo'] ? 'selected' : '' ?>

>

<?= $tipo ?>

</option>

<?php } ?>

        </select>

    </div>

    <div class="col-md-3 mb-3">

        <label>Prioridade</label>

        <select
            name="prioridade"
            class="form-select">

<?php

$prioridades=[

"Baixa",
"Media",
"Alta"

];

foreach($prioridades as $prioridade)
{

?>

<option

<?= $prioridade==$chamado['prioridade'] ? 'selected' : '' ?>

>

<?= $prioridade ?>

</option>

<?php } ?>

        </select>

    </div>

    <div class="col-md-4 mb-3">

        <label>Status</label>

        <select
            name="status"
            class="form-select">

<?php

$statuss=[

"Aberto",
"Em Atendimento",
"Finalizado"

];

foreach($statuss as $status)
{

?>

<option

<?= $status==$chamado['status'] ? 'selected' : '' ?>

>

<?= $status ?>

</option>

<?php } ?>

        </select>

    </div>

    <div class="col-md-8 mb-3">

        <label>Data</label>

        <input

        type="date"

        name="data_abertura"

        class="form-control"

        value="<?= $chamado['data_abertura'] ?>">

    </div>

    <div class="col-md-12 mb-3">

        <label>Descrição</label>

        <textarea

        name="descricao"

        class="form-control"

        rows="4"><?= $chamado['descricao'] ?></textarea>

    </div>

    <div class="col-md-12 mb-3">

        <label>Observação</label>

        <textarea

        name="observacao"

        class="form-control"

        rows="4"><?= $chamado['observacao'] ?></textarea>

    </div>

</div>

<button class="btn btn-success">

<i class="bi bi-check-circle"></i>

Salvar Alterações

</button>

<a

href="index.php?modulo=chamados"

class="btn btn-secondary">

Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>