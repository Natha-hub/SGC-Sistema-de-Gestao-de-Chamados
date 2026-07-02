<?php require "../app/views/layout/header.php"; ?>
<?php require "../app/views/layout/navbar.php"; ?>

<h2 class="mb-4">

    <i class="bi bi-speedometer2"></i>

    Dashboard

</h2>

<div class="row">

    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body text-center">

                <h5>Clientes</h5>

               <h2><?= $clientes ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body text-center">

                <h5>Chamados</h5>

                <h2><?= $chamados ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-warning">

            <div class="card-body text-center">

                <h5>Equipes</h5>

                <h2><?= $equipes ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body text-center">

            <h5>Agendados</h5>

            <h2><?= $agendados ?></h2>

            </div>

        </div>

    </div>

</div>

<div class="mt-5">

    <h4>Bem-vindo ao SGC</h4>

    <p>

        Sistema de Gestão de Chamados desenvolvido em PHP utilizando arquitetura MVC.

    </p>

</div>

<hr class="my-5">

<div class="card shadow">

    <div class="card-header bg-dark text-white">

        <i class="bi bi-graph-up-arrow"></i>

        SLA dos Chamados em Tempo Real

    </div>

   <div class="card-body">

    <div id="painelSLA"></div>

</div>

</div>


<script>

const chamados = <?= json_encode($slas) ?>;

const painel = document.getElementById("painelSLA");

function atualizarPainel() {

    painel.innerHTML = "";

    chamados.sort((a, b) => {

    const agora = new Date();

    const restanteA =
        new Date(a.data_abertura.replace(" ", "T")).getTime()
        + (a.prazo_segundos * 1000)
        - agora.getTime();

    const restanteB =
        new Date(b.data_abertura.replace(" ", "T")).getTime()
        + (b.prazo_segundos * 1000)
        - agora.getTime();

    return restanteA - restanteB;

});

    chamados.forEach(chamado => {

    const abertura = new Date(
        chamado.data_abertura.replace(" ", "T")
    );

    const agora = new Date();

    const decorrido = Math.floor(
        (agora.getTime() - abertura.getTime()) / 1000
    );

    console.log({
    id: chamado.id,
    dataBanco: chamado.data_abertura,
    abertura: abertura.toLocaleString(),
    agora: agora.toLocaleString(),
    decorrido: decorrido,
    prazo: chamado.prazo_segundos
});

        let restante = chamado.prazo_segundos - decorrido;

        if (restante < 0)
            restante = 0;

        let percentual = (restante / chamado.prazo_segundos) * 100;

        if (percentual < 0)
            percentual = 0;

        let cor = "bg-success";

if (restante <= 0){

    cor = "bg-danger";

}
else if(percentual <= 20){

    cor = "bg-danger";

}
else if(percentual <= 50){

    cor = "bg-warning";

}

        if (percentual <= 50)
            cor = "bg-warning";

        if (percentual <= 20)
            cor = "bg-danger";

        const minutos = Math.floor(restante / 60);

        const segundos = restante % 60;

       let tempo;

if (restante <= 0) {

    tempo = "ATRASADO";

} else {

    tempo =
        minutos.toString().padStart(2, "0") +
        ":" +
        segundos.toString().padStart(2, "0");

}

        painel.innerHTML += `
            <div class="mb-4">

                <div class="d-flex justify-content-between">

                    <strong>
                        OS #${chamado.id} - ${chamado.cliente}
                    </strong>

                   <strong class="${
    restante <= 0 ? 'text-danger' : 'text-white'
}">

    ${tempo}

</strong>
                </div>

                <small class="text-secondary">
                    ${chamado.tipo}
                </small>

                <div class="progress mt-2" style="height:22px;">

                    <div
                        class="progress-bar ${cor}"
                        style="width:${percentual}%">
                    </div>

                </div>

            </div>
        `;

    });

}

atualizarPainel();

setInterval(atualizarPainel, 1000);

</script>

<?php require "../app/views/layout/footer.php"; ?>