<?php

require_once "../config/database.php";

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

        require "../app/views/dashboard/index.php";
    }
}