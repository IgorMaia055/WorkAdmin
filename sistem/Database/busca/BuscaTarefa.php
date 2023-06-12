<?php

namespace sistem\Database\busca;

use sistem\Nucleo\Connection;

class BuscaTarefa
{

    public function buscar(string $busc): array
    {
        $query = "SELECT * FROM service_funcionario WHERE servico LIKE '%{$busc}%' OR detalhe LIKE '%{$busc}%' OR `data` LIKE '%{$busc}%' OR dateF LIKE '%{$busc}%' ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}