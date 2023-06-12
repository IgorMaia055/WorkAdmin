<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectContaPj
{
    public function select(string $cnpj, string $senha)
    {
        $query = "SELECT id FROM login_save WHERE cnpj = '". $cnpj ."' AND senha = '". $senha ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }
}