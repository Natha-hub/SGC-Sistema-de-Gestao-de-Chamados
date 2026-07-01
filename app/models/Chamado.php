<?php

require_once "../config/database.php";

class Chamado
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

   public function listar()
{
    $sql = "SELECT
                chamados.*,
                clientes.nome AS cliente
            FROM chamados
            INNER JOIN clientes
                ON chamados.cliente_id = clientes.id
            ORDER BY chamados.id DESC";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 public function salvar($dados)
{
    $sql = "INSERT INTO chamados
    (
        cliente_id,
        tipo,
        prioridade,
        status,
        descricao,
        observacao,
        data_abertura
    )

    VALUES
    (
        :cliente_id,
        :tipo,
        :prioridade,
        :status,
        :descricao,
        :observacao,
        :data_abertura
    )";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([

        ':cliente_id'    => $dados['cliente_id'],
        ':tipo'          => $dados['tipo'],
        ':prioridade'    => $dados['prioridade'],
        ':status'        => $dados['status'],
        ':descricao'     => $dados['descricao'],
        ':observacao'    => $dados['observacao'],
        ':data_abertura' => $dados['data_abertura']

    ]);
}

    public function excluir($id)
    {
    $sql = "DELETE FROM chamados WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
    }

   public function buscarPorId($id)
{
    $sql = "SELECT *
            FROM chamados
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizar($dados)
{
    $sql = "UPDATE chamados SET

        cliente_id = :cliente_id,
        tipo = :tipo,
        prioridade = :prioridade,
        status = :status,
        descricao = :descricao,
        observacao = :observacao,
        data_abertura = :data_abertura

        WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([

        ':cliente_id'    => $dados['cliente_id'],
        ':tipo'          => $dados['tipo'],
        ':prioridade'    => $dados['prioridade'],
        ':status'        => $dados['status'],
        ':descricao'     => $dados['descricao'],
        ':observacao'    => $dados['observacao'],
        ':data_abertura' => $dados['data_abertura'],
        ':id'            => $dados['id']

    ]);
}

public function pesquisar($cliente)
{
    $sql = "SELECT * FROM chamados
            WHERE cliente LIKE :cliente
            ORDER BY id DESC";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        ':cliente' => "%".$cliente."%"
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function dashboard()
{
    $sql = "SELECT status, COUNT(*) AS total
            FROM chamados
            GROUP BY status";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function totais()
{
    $sql = "SELECT
            COUNT(*) AS total,
            SUM(status='Aberto') AS abertos,
            SUM(status='Em andamento') AS andamento,
            SUM(status='Finalizado') AS finalizados
            FROM chamados";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



}   