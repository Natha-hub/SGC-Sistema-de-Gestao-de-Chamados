<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-people-fill"></i>

        Equipes

    </h2>

    <a href="index.php?modulo=equipes&action=novo"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nova Equipe

    </a>

</div>

<form method="GET" action="index.php" class="row mb-4">

    <input type="hidden" name="modulo" value="equipes">

    <div class="col-md-8">

        <input
            type="text"
            name="pesquisa"
            class="form-control"
            placeholder="Pesquisar por nome, empresa ou cidade">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">

            <i class="bi bi-search"></i>

            Pesquisar

        </button>

    </div>

    <div class="col-md-2">

        <a href="index.php?modulo=equipes"
           class="btn btn-secondary w-100">

            <i class="bi bi-x-circle"></i>

            Limpar

        </a>

    </div>

</form>

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Empresa</th>
            <th>Cidade</th>
            <th>Telefone</th>
            
            <th width="170">Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php if(count($equipes)>0): ?>

        <?php foreach($equipes as $equipe): ?>

        <tr>

            <td><?= $equipe['id'] ?></td>

            <td><?= $equipe['nome'] ?></td>

            <td><?= $equipe['tipo'] ?></td>

            <td><?= $equipe['empresa'] ?></td>

            <td><?= $equipe['cidade'] ?></td>

            <td><?= $equipe['telefone'] ?></td>

            <td>

                <?php

                

                ?>

            </td>

            <td>

                <a
                href="index.php?modulo=equipes&action=editar&id=<?= $equipe['id'] ?>"
                class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>

                </a>

                <a
                href="index.php?modulo=equipes&action=excluir&id=<?= $equipe['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Deseja excluir esta equipe?')">

                    <i class="bi bi-trash"></i>

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>

            <td colspan="8" class="text-center">

                Nenhuma equipe cadastrada.

            </td>

        </tr>

    <?php endif; ?>

    </tbody>

</table>

<?php require "../app/views/layout/footer.php"; ?>