<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertTarefa
{
    public function insert(array $dados): void
    {
        $query = "INSERT INTO service_funcionario (id_orcamento, id_funcionario, servico, detalhe) VALUES ('". intval($dados['veiculos']) ."', '". intval($dados['funcionarios']) ."', '". $dados['servico'] ."', '". $dados['detalhe'] ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}