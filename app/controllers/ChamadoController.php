<?php

require_once "../app/models/Chamado.php";
require_once "../app/models/Cliente.php";

class ChamadoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Chamado();
    }

    public function index()
    {
        $chamados = $this->model->listar();

        require "../app/views/chamados/index.php";
    }

    public function novo()
    {
        $clienteModel = new Cliente();

        $clientes = $clienteModel->listar();

        require "../app/views/chamados/create.php";
    }

    public function salvar()
    {
        $this->model->salvar($_POST);

        header("Location: index.php?modulo=chamados");

        exit;
    }

    public function editar()
    {
        $chamado = $this->model->buscarPorId($_GET['id']);

        $clienteModel = new Cliente();

        $clientes = $clienteModel->listar();

        require "../app/views/chamados/edit.php";
    }

    public function atualizar()
    {
        $this->model->atualizar($_POST);

        header("Location: index.php?modulo=chamados");

        exit;
    }

    public function excluir()
    {
        $this->model->excluir($_GET['id']);

        header("Location: index.php?modulo=chamados");

        exit;
    }
}