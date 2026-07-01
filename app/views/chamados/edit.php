<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Editar Chamado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Editar Chamado</h2>

    <form method="POST" action="index.php?action=atualizar">

        <input type="hidden" name="id" value="<?= $chamado['id'] ?>">

        <div class="mb-3">

            <label class="form-label">Cliente</label>

            <input
                type="text"
                name="cliente"
                class="form-control"
                value="<?= $chamado['cliente'] ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Cidade</label>

            <input
                type="text"
                name="cidade"
                class="form-control"
                value="<?= $chamado['cidade'] ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Prioridade</label>

            <select name="prioridade" class="form-select">

                <option <?= $chamado['prioridade']=="Baixa"?"selected":"" ?>>Baixa</option>

                <option <?= $chamado['prioridade']=="Média"?"selected":"" ?>>Média</option>

                <option <?= $chamado['prioridade']=="Alta"?"selected":"" ?>>Alta</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option <?= $chamado['status']=="Aberto"?"selected":"" ?>>Aberto</option>

                <option <?= $chamado['status']=="Em andamento"?"selected":"" ?>>Em andamento</option>

                <option <?= $chamado['status']=="Finalizado"?"selected":"" ?>>Finalizado</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Descrição</label>

            <textarea
                name="descricao"
                class="form-control"><?= $chamado['descricao'] ?></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">Data</label>

            <input
                type="date"
                name="data_abertura"
                class="form-control"
                value="<?= $chamado['data_abertura'] ?>">

        </div>

        <button class="btn btn-success">
            Salvar Alterações
        </button>

        <a href="index.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

</body>
</html>