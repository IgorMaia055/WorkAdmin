<?php

namespace sistem\Database\busca;

use sistem\Nucleo\Connection;

class BuscaRecibo
{

    public function buscar(string $busc): array
    {
        $query = "SELECT * FROM recibos WHERE cliente LIKE '%{$busc}%' OR valorTexto LIKE '%{$busc}%' OR servico LIKE '%{$busc}%' OR valor LIKE '%{$busc}%' OR `data` LIKE '%{$busc}%' ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}