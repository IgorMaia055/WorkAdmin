<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectOrcamentos
{
    public function busca(bool $states = false): array
    {
        $where = ($states ? 'WHERE states = 1' : "");

        $query = "SELECT * FROM orcamentos {$where} ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
            return $result;
    }

    public function buscaPendencia(): array 
    {
        $query = "SELECT * FROM orcamentos WHERE states = '". 0 ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
            return $result;
    }

    public function buscaLucros(bool $states = false): array
    {
        $where = ($states ? "WHERE states = 1" : "");
        $selectId = "SELECT id FROM orcamentos {$where} ORDER BY id DESC";
        $resultId = Connection::getInstancia()->query($selectId)->fetchAll();
        $id = $resultId[0]->id;
            $query = "SELECT * FROM lucros WHERE id_orcamento = '". $id ."'";
            $result = Connection::getInstancia()->query($query)->fetchAll();
                return $result;        

    }

    public function buscaOrcamento(string $id): array
    {
        $select = "SELECT * FROM orcamentos WHERE id = '". $id ."'";
        $result = Connection::getInstancia()->query($select)->fetchAll();
        return $result;
    }

    public function buscaLucroOrcamento(string $id): array 
    {
        $select = "SELECT * FROM lucros WHERE id_orcamento = '". $id ."'";
        $result = Connection::getInstancia()->query($select)->fetchAll();
        return $result;
    }

    public function buscaServicoOrcamento(string $id): array
    {
        $select = "SELECT * FROM servicos WHERE id_orcamento = '". $id ."'";
        $result = Connection::getInstancia()->query($select)->fetchAll();
        return $result;
    }

}