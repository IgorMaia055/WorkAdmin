<?php

namespace sistem\Database\busca;

use sistem\Nucleo\Connection;

class Busca
{

    public function buscar(string $busc): array
    {
        $query = "SELECT * FROM orcamentos WHERE cliente LIKE '%{$busc}%' OR veiculo LIKE '%{$busc}%' OR dataR LIKE '%{$busc}%' ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}