<?php

require_once "../config/database.php";
require_once "../app/models/Chamado.php";

class DashboardController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

public function index()
{
    $clientes = $this->conn->query("SELECT COUNT(*) FROM clientes")->fetchColumn();

    $chamados = $this->conn->query("SELECT COUNT(*) FROM chamados")->fetchColumn();

    $equipes = $this->conn->query("SELECT COUNT(*) FROM equipes")->fetchColumn();

    $agendamentos = $this->conn->query("SELECT COUNT(*) FROM agendamentos")->fetchColumn();

    $chamadoModel = new Chamado();

    $slas = $chamadoModel->listarSLA();

    require "../app/views/dashboard/index.php";
}
}