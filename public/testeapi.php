<?php

$json = file_get_contents(
    "https://randomuser.me/api/?results=10&nat=br"
);

$dados = json_decode($json, true);

foreach($dados["results"] as $cliente)
{

    echo $cliente["name"]["first"];

    echo "<br>";

    echo $cliente["email"];

    echo "<br>";

    echo $cliente["phone"];

    echo "<hr>";

    $sql="INSERT INTO clientes
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

}