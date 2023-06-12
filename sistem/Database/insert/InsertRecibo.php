<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertRecibo
{
    public function insertData(array $dados): void
    {
      $servico = $dados['servico'] . ' _ ' . $dados['servico2'];
        $query = "INSERT INTO recibos (cliente, valorTexto, servico, valor, `data`) VALUES ('". $dados['cliente'] ."', '". $dados['valorText'] ."', '". $servico ."', '". $dados['valor'] ."', '". $dados['data'] ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}