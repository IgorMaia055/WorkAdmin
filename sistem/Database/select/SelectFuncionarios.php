<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectFuncionarios
{
    public function busca(): array
    {
        $query = "SELECT * FROM funcionarios WHERE states = '". 1 ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

    public function buscaFuncionario(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM funcionarios WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }



}