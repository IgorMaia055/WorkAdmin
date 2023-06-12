<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeletarOrcamento
{
    public function insertData(string $id)
    {
        $idInt = intval($id);
        $queryServise = "DELETE FROM servicos WHERE id_orcamento = '". $idInt ."'";
        $result2 = Connection::getInstancia()->query($queryServise)->fetchAll();

        $queryLucro = "DELETE FROM lucros WHERE id_orcamento = '". $idInt ."'";
        $result3 = Connection::getInstancia()->query($queryLucro)->fetchAll();
        $query = "DELETE FROM orcamentos WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

    }

}