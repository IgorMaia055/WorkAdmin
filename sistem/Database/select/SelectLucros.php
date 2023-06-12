<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectLucros
{
    public function busca(): array
    {
        $query = "SELECT * FROM lucros WHERE states = 1 ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}