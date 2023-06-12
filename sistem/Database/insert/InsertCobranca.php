<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertCobranca
{
    public function insert(array $dados): void
    {
        $servico = $dados['servico'] . ' _ ' . $dados['servico2'];

        $query = "INSERT INTO cobranca (cliente, endereco, tel, servico, valor, valorCobranca) VALUES ('". $dados['devedor'] ."', '". $dados['endereco'] ."', '". $dados['tel'] ."', '". $servico ."', '". $dados['total'] ."', '". $dados['cobranca'] ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}