<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectRecibos
{
    public function busca(): array
    {
        $query = "SELECT * FROM recibos ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

    public function buscaRecibo(string $id): array 
    {
        $idInt = intval($id);

        $query = "SELECT * FROM recibos WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}