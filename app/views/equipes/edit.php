<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-pencil-square"></i>

    Editar Equipe

</h2>

<form action="index.php?modulo=equipes&action=atualizar" method="POST">

<input
type="hidden"
name="id"
value="<?= $equipe['id'] ?>">

<div class="row">

    <div class="col-md-6 mb-3">

        <label>Nome da Equipe</label>

        <input
            type="text"
            name="nome"
            class="form-control"
            value="<?= $equipe['nome'] ?>"
            required>

    </div>

    <div class="col-md-3 mb-3">

        <label>Tipo</label>

        <select
            name="tipo"
            class="form-select">

            <option <?= $equipe['tipo']=="Própria"?"selected":"" ?>>Própria</option>

            <option <?= $equipe['tipo']=="Terceirizada"?"selected":"" ?>>Terceirizada</option>

        </select>

    </div>

    <div class="col-md-3 mb-3">

        <label>Empresa</label>

        <input
            type="text"
            name="empresa"
            class="form-control"
            value="<?= $equipe['empresa'] ?>">

    </div>

    <div class="col-md-4 mb-3">

        <label>Cidade</label>

        <input
            type="text"
            name="cidade"
            class="form-control"
            value="<?= $equipe['cidade'] ?>">

    </div>

    <div class="col-md-4 mb-3">

        <label>Telefone</label>

        <input
            type="text"
            name="telefone"
            class="form-control"
            value="<?= $equipe['telefone'] ?>">

    </div>

   

</div>

<button class="btn btn-success">

    <i class="bi bi-check-circle"></i>

    Salvar Alterações

</button>

<a
href="index.php?modulo=equipes"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php require "../app/views/layout/footer.php"; ?>