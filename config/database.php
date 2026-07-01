<?php

class Database
{
    private $host = "localhost";
    private $dbname = "sistema_chamados";
    private $user = "root";
    private $pass = "";

    public function conectar()
    {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->pass
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {

            die("Erro na conexão: " . $e->getMessage());

        }
    }
}