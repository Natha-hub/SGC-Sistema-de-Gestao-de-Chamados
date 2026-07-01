<?php

require_once "../app/models/Cliente.php";

class ClienteController
{
    private $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function index()
    {
        $clientes = $this->model->listar();

        require "../app/views/clientes/index.php";
    }

    public function novo()
    {
        require "../app/views/clientes/create.php";
    }

    public function salvar()
    {
        $this->model->salvar($_POST);

        header("Location: index.php?modulo=clientes");

        exit;
    }

    public function editar()
    {
        $cliente = $this->model->buscarPorId($_GET['id']);

        require "../app/views/clientes/edit.php";
    }

    public function atualizar()
    {
        $this->model->atualizar($_POST);

        header("Location: index.php?modulo=clientes");

        exit;
    }

    public function excluir()
    {
        $this->model->excluir($_GET['id']);

        header("Location: index.php?modulo=clientes");

        exit;
    }
}