<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateOrcamento 
{
    public function states(string $id, string $dataEntrega): void 
    {
        $idInt = intval($id);

        $selectQuery = "SELECT states FROM orcamentos WHERE id = '". $idInt ."'";
        $resultSelect = Connection::getInstancia()->query($selectQuery)->fetchAll();
        $states = $resultSelect[0]->states;

        $value = ($states == 1 ? 0 : 1);
        
        $query = "UPDATE orcamentos SET states = '". $value ."', data_entrega = '". $dataEntrega ."' WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        $query2 = "UPDATE lucros SET states = '". $value ."' WHERE id_orcamento = '". $idInt ."'";
        $result2 = Connection::getInstancia()->query($query2)->fetchAll();
    }

    public function entrega(string $id): void 
    {
        $idInt = intval($id);

        $query = "UPDATE orcamentos SET states = '". 0 ."', data_entrega = '' WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        $query2 = "UPDATE lucros SET states = '". $value ."' WHERE id_orcamento = '". $idInt ."'";
        $result2 = Connection::getInstancia()->query($query2)->fetchAll();
    }
}