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
    if(isset($_GET['pesquisa']) && $_GET['pesquisa'] != "")
    {
        $clientes = $this->model->pesquisar($_GET['pesquisa']);
    }
    else
    {
        $clientes = $this->model->listar();
    }

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

        public function importar()
{
    $this->model->importarRandomUsers();

    header("Location: index.php?modulo=clientes");

    exit;
}

    public function excluir()
    {
       if(!$this->model->excluir($_GET['id']))
    {
    echo "<script>
            alert('Não é possível excluir um cliente que possui chamados.');
            window.location='index.php?modulo=clientes';
          </script>";
    exit;
    }   




header("Location: index.php?modulo=clientes");
exit;

        exit;
    }
}