<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-person-plus-fill"></i>

    Nova Equipe

</h2>

<form action="index.php?modulo=equipes&action=salvar" method="POST">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Nome da Equipe</label>

        <input
            type="text"
            name="nome"
            class="form-control"
            required>

    </div>

    <div class="col-md-3 mb-3">

        <label>Tipo</label>

        <select
            name="tipo"
            class="form-select">

            <option>Própria</option>
            <option>Terceirizada</option>

        </select>

    </div>

    <div class="col-md-3 mb-3">

        <label>Empresa</label>

        <input
            type="text"
            name="empresa"
            class="form-control">

    </div>

    <div class="col-md-4 mb-3">

        <label>Cidade</label>

        <input
            type="text"
            name="cidade"
            class="form-control">

    </div>

    <div class="col-md-4 mb-3">

        <label>Telefone</label>

        <input
            type="text"
            name="telefone"
            class="form-control">

    </div>

    

</div>

<button class="btn btn-success">

    <i class="bi bi-check-circle"></i>

    Salvar Equipe

</button>

<a
href="index.php?modulo=equipes"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>