<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectServicos
{
    public function buscaTudoServicos(): array
    {
        $query = "SELECT * FROM service_funcionario ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }

    public function busca(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM service_funcionario WHERE id_funcionario = '". $idInt ."' LIMIT 3";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }

    public function buscaTudo(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM service_funcionario WHERE id_funcionario = '". $idInt ."' AND states = '". 1 ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }

    public function buscaPendencia(string $id): array 
    {
        $idInt = intval($id);
        $query = "SELECT * FROM service_funcionario WHERE id_funcionario = '". $idInt ."' AND states = '". 0 ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }

}