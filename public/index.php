<?php

require_once "../app/controllers/ChamadoController.php";

$controller = new ChamadoController();

$action = $_GET['action'] ?? 'listar';

switch ($action) {

    case 'novo':
        $controller->novo();
        break;

    case 'salvar':
        $controller->salvar();
        break;

    case 'excluir':
        $controller->excluir();
        break;

    case 'editar':
        $controller->editar();
        break;

    case 'atualizar':
        $controller->atualizar();
        break;

    case 'dashboard':
        $controller->dashboard();
        break;

    default:
        $controller->index();
        break;

}