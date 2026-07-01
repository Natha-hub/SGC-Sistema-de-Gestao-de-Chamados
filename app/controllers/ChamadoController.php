<?php

require_once "../app/models/Chamado.php";

class ChamadoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Chamado();
    }

    public function index()
{
    if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != "")
    {
        $chamados = $this->model->pesquisar($_GET['pesquisa']);
    }
    else
    {
        $chamados = $this->model->listar();
    }

    require "../app/views/chamados/index.php";
}

    public function novo()
    {
        require "../app/views/chamados/create.php";
    }
    public function salvar()
    {
    $this->model->salvar($_POST);

    header("Location: index.php");

    exit;
    }
    
    public function excluir()
    {
    $this->model->excluir($_GET['id']);

    header("Location: index.php");

    exit;
    }

    public function editar()
    {
    $chamado = $this->model->buscarPorId($_GET['id']);

    require "../app/views/chamados/edit.php";
    }

    public function atualizar()
    {
    $this->model->atualizar($_POST);

    header("Location: index.php");

    exit;
    }

public function dashboard()
{
    $dados = $this->model->dashboard();

    $totais = $this->model->totais();

    require "../app/views/chamados/dashboard.php";
}
}   
