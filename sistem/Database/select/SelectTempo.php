<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectTempo
{
    public function buscar(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT tempo FROM servicos WHERE id_orcamento = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}