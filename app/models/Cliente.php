<?php

require_once "../config/database.php";

class Cliente
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM clientes ORDER BY nome";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar($dados)
    {
        $sql = "INSERT INTO clientes
        (
            nome,
            telefone,
            email,
            cidade,
            bairro,
            endereco,
            numero,
            plano,
            tecnologia,
            status
        )

        VALUES

        (
            :nome,
            :telefone,
            :email,
            :cidade,
            :bairro,
            :endereco,
            :numero,
            :plano,
            :tecnologia,
            :status
        )";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':nome' => $dados['nome'],
            ':telefone' => $dados['telefone'],
            ':email' => $dados['email'],
            ':cidade' => $dados['cidade'],
            ':bairro' => $dados['bairro'],
            ':endereco' => $dados['endereco'],
            ':numero' => $dados['numero'],
            ':plano' => $dados['plano'],
            ':tecnologia' => $dados['tecnologia'],
            ':status' => $dados['status']

        ]);
    }

    public function atualizar($dados)
    {
        $sql = "UPDATE clientes SET

            nome=:nome,
            telefone=:telefone,
            email=:email,
            cidade=:cidade,
            bairro=:bairro,
            endereco=:endereco,
            numero=:numero,
            plano=:plano,
            tecnologia=:tecnologia,
            status=:status

            WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':id' => $dados['id'],
            ':nome' => $dados['nome'],
            ':telefone' => $dados['telefone'],
            ':email' => $dados['email'],
            ':cidade' => $dados['cidade'],
            ':bairro' => $dados['bairro'],
            ':endereco' => $dados['endereco'],
            ':numero' => $dados['numero'],
            ':plano' => $dados['plano'],
            ':tecnologia' => $dados['tecnologia'],
            ':status' => $dados['status']

        ]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM clientes WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}