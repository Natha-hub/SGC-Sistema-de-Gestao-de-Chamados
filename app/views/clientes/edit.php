<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-pencil-square"></i>

    Editar Cliente

</h2>

<form action="index.php?modulo=clientes&action=atualizar" method="POST">

<input
type="hidden"
name="id"
value="<?= $cliente['id'] ?>">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Nome</label>

        <input
            type="text"
            name="nome"
            class="form-control"
            value="<?= $cliente['nome'] ?>"
            required>

    </div>

    <div class="col-md-3 mb-3">

        <label>Telefone</label>

        <input
            type="text"
            name="telefone"
            class="form-control"
            value="<?= $cliente['telefone'] ?>">

    </div>

    <div class="col-md-3 mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="<?= $cliente['email'] ?>">

    </div>

    <div class="col-md-4 mb-3">

        <label>Cidade</label>

        <input
            type="text"
            name="cidade"
            class="form-control"
            value="<?= $cliente['cidade'] ?>">

    </div>

    <div class="col-md-4 mb-3">

        <label>Bairro</label>

        <input
            type="text"
            name="bairro"
            class="form-control"
            value="<?= $cliente['bairro'] ?>">

    </div>

    <div class="col-md-4 mb-3">

        <label>Endereço</label>

        <input
            type="text"
            name="endereco"
            class="form-control"
            value="<?= $cliente['endereco'] ?>">

    </div>

    <div class="col-md-2 mb-3">

        <label>Número</label>

        <input
            type="text"
            name="numero"
            class="form-control"
            value="<?= $cliente['numero'] ?>">

    </div>

    <div class="col-md-5 mb-3">

        <label>Plano</label>

        <input
            type="text"
            name="plano"
            class="form-control"
            value="<?= $cliente['plano'] ?>">

    </div>

    <div class="col-md-3 mb-3">

        <label>Tecnologia</label>

        <select
            name="tecnologia"
            class="form-select">

            <option <?= $cliente['tecnologia']=="FTTH"?"selected":"" ?>>FTTH</option>

            <option <?= $cliente['tecnologia']=="Radio"?"selected":"" ?>>Radio</option>

            <option <?= $cliente['tecnologia']=="Fibra Dedicada"?"selected":"" ?>>Fibra Dedicada</option>

        </select>

    </div>

    <div class="col-md-2 mb-3">

        <label>Status</label>

        <select
            name="status"
            class="form-select">

            <option <?= $cliente['status']=="Ativo"?"selected":"" ?>>Ativo</option>

            <option <?= $cliente['status']=="Inativo"?"selected":"" ?>>Inativo</option>

        </select>

    </div>

</div>

<button class="btn btn-success">

    <i class="bi bi-check-circle"></i>

    Salvar Alterações

</button>

<a
href="index.php?modulo=clientes"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>