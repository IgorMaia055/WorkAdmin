<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectDocumentos
{
    public function busca(): array
    {
        $query = "SELECT * FROM orcamentos ORDER BY id DESC LIMIT 2";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }
    public function buscaRecibo(): array 
    {
        $query = "SELECT * FROM recibos ORDER BY id DESC LIMIT 1";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}