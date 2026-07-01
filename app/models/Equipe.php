<?php

require_once "../config/database.php";

class Equipe
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM equipes ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($dados)
    {
        $sql = "INSERT INTO equipes
        (
            nome,
            tipo,
            empresa,
            cidade,
            telefone,
            status
        )

        VALUES
        (
            :nome,
            :tipo,
            :empresa,
            :cidade,
            :telefone,
            :status
        )";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':nome'      => $dados['nome'],
            ':tipo'      => $dados['tipo'],
            ':empresa'   => $dados['empresa'],
            ':cidade'    => $dados['cidade'],
            ':telefone'  => $dados['telefone'],
            ':status'    => $dados['status']

        ]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM equipes WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id'=>$id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($dados)
    {
        $sql = "UPDATE equipes SET

        nome=:nome,
        tipo=:tipo,
        empresa=:empresa,
        cidade=:cidade,
        telefone=:telefone,
        status=:status

        WHERE id=:id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':nome'=>$dados['nome'],
            ':tipo'=>$dados['tipo'],
            ':empresa'=>$dados['empresa'],
            ':cidade'=>$dados['cidade'],
            ':telefone'=>$dados['telefone'],
            ':status'=>$dados['status'],
            ':id'=>$dados['id']

        ]);
    }

    public function excluir($id)
    {
        $sql="DELETE FROM equipes WHERE id=:id";

        $stmt=$this->conn->prepare($sql);

        return $stmt->execute([
            ':id'=>$id
        ]);
    }

    public function pesquisar($pesquisa)
    {
        $sql="SELECT *
              FROM equipes
              WHERE nome LIKE :pesquisa
                 OR empresa LIKE :pesquisa
                 OR cidade LIKE :pesquisa
              ORDER BY id DESC";

        $stmt=$this->conn->prepare($sql);

        $stmt->execute([
            ':pesquisa'=>"%".$pesquisa."%"
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}