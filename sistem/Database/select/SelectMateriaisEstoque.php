<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectMateriaisEstoque
{
    public function busca(): array
    {
        $query = "SELECT * FROM estoque ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}