</div>

<footer class="text-center mt-5 mb-3 text-muted">

    <hr>

    SGC - Sistema de Gestão de Chamados

    <br>

    Desenvolvido por Nathanael Pauczinski Vieira

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>

const botao = document.getElementById("btnTema");

if(botao){

    atualizarIcone();

    botao.addEventListener("click", function(){

        const html = document.documentElement;

        let tema = html.getAttribute("data-bs-theme");

        tema = tema === "light" ? "dark" : "light";

        html.setAttribute("data-bs-theme", tema);

        localStorage.setItem("tema", tema);

        atualizarIcone();

    });

}

function atualizarIcone(){

    const tema = document.documentElement.getAttribute("data-bs-theme");

    botao.innerHTML = tema === "dark"

        ? "☀️"

        : "🌙";

}

</script>

</body>

</html>