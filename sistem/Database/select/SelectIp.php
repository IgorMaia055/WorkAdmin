<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectIp
{

    public function select(string $ip): array
    {
        $query = "SELECT * FROM login_save WHERE ip = '". $ip ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }
}