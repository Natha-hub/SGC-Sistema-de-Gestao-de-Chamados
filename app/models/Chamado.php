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

            clientes.nome AS cliente,

            equipes.nome AS equipe

        FROM chamados

        INNER JOIN clientes

            ON chamados.cliente_id = clientes.id

        LEFT JOIN equipes

            ON chamados.equipe_id = equipes.id

        ORDER BY chamados.id DESC";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 public function salvar($dados)
{

    switch($dados['tipo'])
{
    case "Sem conexão":
        $prazo = 45;
        break;

    case "Lentidão":
        $prazo = 120;
        break;

    case "Upgrade":
        $prazo = 180;
        break;

    case "Mudança":
        $prazo = 240;
        break;

    case "Instalação":
        $prazo = 300;
        break;

    case "Retirada":
        $prazo = 360;
        break;

    default:
        $prazo = 300;
}

    $sql = "INSERT INTO chamados
    (
        cliente_id,
        equipe_id,
        tipo,
        prazo_segundos,
        prioridade,
        status,
        descricao,
        observacao,
        data_abertura
    )

    VALUES
    (
        :cliente_id,
        :equipe_id,
        :tipo,
        :prazo_segundos,
        :prioridade,
        :status,
        :descricao,
        :observacao,
        :data_abertura
    )";

    $stmt = $this->conn->prepare($sql);

    if (empty($dados['equipe_id'])) {
    $dados['equipe_id'] = null;
}

    return $stmt->execute([

        ':cliente_id'    => $dados['cliente_id'],
        ':equipe_id' => $dados['equipe_id'],
        ':tipo'          => $dados['tipo'],
        ':prazo_segundos' => $prazo,
        ':prioridade'    => $dados['prioridade'],
        ':status'        => $dados['status'],
        ':descricao'     => $dados['descricao'],
        ':observacao'    => $dados['observacao'],
        ':data_abertura' => date('Y-m-d H:i:s')

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
        equipe_id = :equipe_id,
        tipo = :tipo,
        prioridade = :prioridade,
        status = :status,
        descricao = :descricao,
        observacao = :observacao
        

        WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([

        ':cliente_id'    => $dados['cliente_id'],
        ':tipo'          => $dados['tipo'],
        ':equipe_id'     => $dados['equipe_id'],
        ':prioridade'    => $dados['prioridade'],
        ':status'        => $dados['status'],
        ':descricao'     => $dados['descricao'],
        ':observacao'    => $dados['observacao'],
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

public function listarSLA()
{
    $sql = "SELECT

                chamados.id,
                clientes.nome AS cliente,
                chamados.tipo,
                chamados.prazo_segundos,
                chamados.data_abertura

            FROM chamados

            INNER JOIN clientes
                ON clientes.id = chamados.cliente_id

            WHERE chamados.status <> 'Finalizado'

            ORDER BY chamados.id";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function finalizar($id)
{
    $sql = "UPDATE chamados
            SET status = 'Finalizado',
                data_encerramento = NOW()
            WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}

}   