<?php

namespace sistem\Database\busca;

use sistem\Nucleo\Connection;

class BuscaCobranca
{

    public function buscar(string $busc): array
    {
        $query = "SELECT * FROM cobranca WHERE cliente LIKE '%{$busc}%' OR endereco LIKE '%{$busc}%' OR tel LIKE '%{$busc}%' OR servico LIKE '%{$busc}%' OR valor LIKE '%{$busc}%' OR valorCobranca LIKE '%{$busc}%' ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}