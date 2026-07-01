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

                <h5>Agendamentos</h5>

                <h2><?= $agendamentos ?></h2>

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

function atualizarPainel(){

    painel.innerHTML="";

    const abertura = Math.floor(
    new Date(chamado.data_abertura.replace(" ", "T")).getTime()/1000
);

    chamados.forEach(chamado=>{

        const abertura = Math.floor(new Date(chamado.data_abertura).getTime()/1000);

        const decorrido = agora - abertura;

        console.log({
    id: chamado.id,
    agora,
    abertura,
    decorrido,
    prazo: chamado.prazo_segundos
});

        let restante = chamado.prazo_segundos - decorrido;

        if(restante < 0)
            restante = 0;

        let percentual = (restante/chamado.prazo_segundos)*100;

        if(percentual < 0)
            percentual = 0;

        let cor="bg-success";

        if(percentual<=50)
            cor="bg-warning";

        if(percentual<=20)
            cor="bg-danger";

        const minutos = Math.floor(restante/60);

        const segundos = restante%60;

        const tempo =
            minutos.toString().padStart(2,"0")+
            ":"+
            segundos.toString().padStart(2,"0");

        painel.innerHTML += `

        <div class="mb-4">

            <div class="d-flex justify-content-between">

                <strong>

                    OS #${chamado.id} - ${chamado.cliente}

                </strong>

                <strong>

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

</script>

<?php require "../app/views/layout/footer.php"; ?>