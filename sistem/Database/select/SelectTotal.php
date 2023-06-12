<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectTotal
{
    public function busca(int $tipo): array
    {
        $query = "SELECT total FROM orcamentos WHERE tipo = '". $tipo ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}