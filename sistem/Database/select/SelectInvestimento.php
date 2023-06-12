<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectInvestimento
{
    public function busca(): array
    {
        $query = "SELECT * FROM investimento ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}