<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Novo Chamado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">
        <i class="bi bi-plus-circle"></i>
        Novo Chamado
    </h2>

    <form method="POST" action="index.php?action=salvar">

        <div class="mb-3">

            <label class="form-label">Cliente</label>

            <input
                type="text"
                name="cliente"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Cidade</label>

            <input
                type="text"
                name="cidade"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Prioridade</label>

            <select
                name="prioridade"
                class="form-select">

                <option>Baixa</option>
                <option>Média</option>
                <option>Alta</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Status</label>

            <select
                name="status"
                class="form-select">

                <option>Aberto</option>
                <option>Em andamento</option>
                <option>Finalizado</option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Descrição</label>

            <textarea
                name="descricao"
                class="form-control"
                rows="4"></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">Data</label>

            <input
                type="date"
                name="data_abertura"
                class="form-control"
                required>

        </div>

        <button class="btn btn-success">

            <i class="bi bi-check-circle"></i>

            Salvar

        </button>

        <a href="index.php" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Voltar

        </a>

    </form>

</div>

</body>

</html>