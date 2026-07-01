<?php

require_once "../app/models/Equipe.php";

class EquipeController
{
    private $model;

    public function __construct()
    {
        $this->model = new Equipe();
    }

    public function index()
    {
        if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != "")
        {
            $equipes = $this->model->pesquisar($_GET['pesquisa']);
        }
        else
        {
            $equipes = $this->model->listar();
        }

        require "../app/views/equipes/index.php";
    }

    public function novo()
    {
        require "../app/views/equipes/create.php";
    }

    public function salvar()
    {
        $this->model->salvar($_POST);

        header("Location: index.php?modulo=equipes");

        exit;
    }

    public function editar()
    {
        $equipe = $this->model->buscarPorId($_GET['id']);

        require "../app/views/equipes/edit.php";
    }

    public function atualizar()
    {
        $this->model->atualizar($_POST);

        header("Location: index.php?modulo=equipes");

        exit;
    }

    public function excluir()
    {
        $this->model->excluir($_GET['id']);

        header("Location: index.php?modulo=equipes");

        exit;
    }
}