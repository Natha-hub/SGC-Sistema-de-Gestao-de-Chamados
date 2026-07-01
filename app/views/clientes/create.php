<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-person-plus"></i>

    Novo Cliente

</h2>

<form action="index.php?modulo=clientes&action=salvar" method="POST">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Nome</label>

        <input
            type="text"
            name="nome"
            class="form-control"
            required>

    </div>

    <div class="col-md-3 mb-3">

        <label>Telefone</label>

        <input
            type="text"
            name="telefone"
            class="form-control">

    </div>

    <div class="col-md-3 mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
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

        <label>Bairro</label>

        <input
            type="text"
            name="bairro"
            class="form-control">

    </div>

    <div class="col-md-4 mb-3">

        <label>Endereço</label>

        <input
            type="text"
            name="endereco"
            class="form-control">

    </div>

    <div class="col-md-2 mb-3">

        <label>Número</label>

        <input
            type="text"
            name="numero"
            class="form-control">

    </div>

    <div class="col-md-5 mb-3">

        <label>Plano</label>

        <input
            type="text"
            name="plano"
            class="form-control">

    </div>

    <div class="col-md-3 mb-3">

        <label>Tecnologia</label>

        <select
            name="tecnologia"
            class="form-select">

            <option>FTTH</option>
            <option>Radio</option>
            <option>Fibra Dedicada</option>

        </select>

    </div>

    <div class="col-md-2 mb-3">

        <label>Status</label>

        <select
            name="status"
            class="form-select">

            <option>Ativo</option>
            <option>Inativo</option>

        </select>

    </div>

</div>

<button class="btn btn-success">

    <i class="bi bi-check-circle"></i>

    Salvar

</button>

<a href="index.php?modulo=clientes"
   class="btn btn-secondary">

    Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>