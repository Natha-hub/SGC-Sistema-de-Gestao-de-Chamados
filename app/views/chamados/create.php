<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-tools"></i>

    Novo Chamado

</h2>

<form action="index.php?modulo=chamados&action=salvar" method="POST">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Cliente</label>

        <select
            name="cliente_id"
            class="form-select"
            required>

            <option value="">Selecione...</option>

            <?php foreach($clientes as $cliente): ?>

                <option value="<?= $cliente['id'] ?>">

                    <?= $cliente['nome'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label>Equipe Responsável</label>

        <select
            name="equipe_id"
            class="form-select">

            <option value="">Selecione...</option>

            <?php foreach($equipes as $equipe): ?>

                <option value="<?= $equipe['id'] ?>">

                    <?= $equipe['nome'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="col-md-4 mb-3">

        <label>Tipo</label>

        <select
            name="tipo"
            class="form-select">

            <option>Sem conexão</option>
            <option>Lentidão</option>
            <option>Instalação</option>
            <option>Mudança</option>
            <option>Upgrade</option>
            <option>Retirada</option>
            <option>Outro</option>

        </select>

    </div>

    <div class="col-md-4 mb-3">

        <label>Prioridade</label>

        <select
            name="prioridade"
            class="form-select">

            <option>Baixa</option>
            <option>Media</option>
            <option>Alta</option>

        </select>

    </div>

    <div class="col-md-4 mb-3">

        <label>Status</label>

        <select
            name="status"
            class="form-select">

            <option>Aberto</option>
            <option>Em Atendimento</option>
            <option>Finalizado</option>

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label>Data de Abertura</label>

        <input
            type="date"
            name="data_abertura"
            class="form-control"
            value="<?= date('Y-m-d') ?>">

    </div>

    <div class="col-md-12 mb-3">

        <label>Descrição</label>

        <textarea
            name="descricao"
            class="form-control"
            rows="4"></textarea>

    </div>

    <div class="col-md-12 mb-3">

        <label>Observação</label>

        <textarea
            name="observacao"
            class="form-control"
            rows="4"></textarea>

    </div>

</div>

<button class="btn btn-success">

    <i class="bi bi-check-circle"></i>

    Salvar Chamado

</button>

<a
href="index.php?modulo=chamados"
class="btn btn-secondary">

    Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>