<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertBatePonto
{
    public function insert(array $dados): void
    {
        $query = "INSERT INTO bate_ponto (data_trabalho, entrada, saida, valor, id_funcionario) VALUES ('". $dados['date'] ."', '". $dados['entrada'] ."', '". $dados['saida'] ."', '". $dados['valor'] ."', '". $dados['id_funcionario'] ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}