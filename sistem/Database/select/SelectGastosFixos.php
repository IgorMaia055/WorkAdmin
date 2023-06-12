<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectGastosFixos
{

    public function busca(): array
    {
        $query = "SELECT * FROM gasto_fixo ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }
}