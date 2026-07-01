<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>

        <i class="bi bi-people"></i>

        Clientes

    </h2>

    <a href="index.php?modulo=clientes&action=novo"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Novo Cliente

    </a>

</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Plano</th>
            <th>Status</th>
            <th width="180">Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php if(count($clientes)>0): ?>

        <?php foreach($clientes as $cliente): ?>

        <tr>

            <td><?= $cliente['id'] ?></td>

            <td><?= $cliente['nome'] ?></td>

            <td><?= $cliente['telefone'] ?></td>

            <td><?= $cliente['cidade'] ?></td>

            <td><?= $cliente['plano'] ?></td>

            <td>

                <?php if($cliente['status']=="Ativo"): ?>

                    <span class="badge bg-success">

                        Ativo

                    </span>

                <?php else: ?>

                    <span class="badge bg-danger">

                        Inativo

                    </span>

                <?php endif; ?>

            </td>

            <td>

                <a
                href="index.php?modulo=clientes&action=editar&id=<?= $cliente['id'] ?>"
                class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>

                    Editar

                </a>

                <a
                href="index.php?modulo=clientes&action=excluir&id=<?= $cliente['id'] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Deseja excluir este cliente?')">

                    <i class="bi bi-trash"></i>

                    Excluir

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>

            <td colspan="7" class="text-center">

                Nenhum cliente cadastrado.

            </td>

        </tr>

    <?php endif; ?>

    </tbody>

</table>

<?php require "../app/views/layout/footer.php"; ?>