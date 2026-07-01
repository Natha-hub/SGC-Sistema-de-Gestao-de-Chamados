<?php

date_default_timezone_set('America/Sao_Paulo');

$modulo = $_GET['modulo'] ?? 'dashboard';

$action = $_GET['action'] ?? 'index';

switch($modulo)
{

    case 'clientes':

        require_once "../app/controllers/ClienteController.php";

        $controller = new ClienteController();

        break;

    case 'chamados':

        require_once "../app/controllers/ChamadoController.php";

        $controller = new ChamadoController();

        break;

    case 'equipes':

        require_once "../app/controllers/EquipeController.php";

        $controller = new EquipeController();

        break;

    case 'agendamentos':

        require_once "../app/controllers/AgendamentoController.php";

        $controller = new AgendamentoController();

        break;

    default:

        require_once "../app/controllers/DashboardController.php";

        $controller = new DashboardController();

        break;

}

switch($action)
{

    case 'finalizar':

        $controller->finalizar();

    break;

    case 'novo':

        $controller->novo();

        break;

    case 'salvar':

        $controller->salvar();

        break;

    case 'editar':

        $controller->editar();

        break;

    case 'atualizar':

        $controller->atualizar();

        break;

    case 'excluir':

        $controller->excluir();

        break;

    default:

        $controller->index();

        break;

}