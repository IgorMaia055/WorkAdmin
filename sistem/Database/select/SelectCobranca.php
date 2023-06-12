<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectCobranca
{
    public function busca(bool $condicao = false, string $id): array
    {
        $idInt = intval($id);

        $where = ($condicao ? "WHERE id = '". $idInt ."'" : "");

        $query = "SELECT * FROM cobranca {$where} ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }
}