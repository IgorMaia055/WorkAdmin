<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectLucrosMes
{
    public function select($mes): array
    {
        $mesInt = intval($mes);
        $query = "SELECT lucro FROM lucros WHERE mes = '". $mesInt ."' AND states = 1 ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}