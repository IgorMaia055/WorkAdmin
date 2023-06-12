<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectGastos
{

    public function busca(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM gastos WHERE id_funcionario = '". $idInt ."' LIMIT 3";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }

    public function buscaTudo(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM gastos WHERE id_funcionario = '". $idInt ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }
}