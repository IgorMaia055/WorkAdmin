<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateTimer 
{
    public function update(string $timer, string $id): void
    {
        $idInt = intval($id);

        $query = "UPDATE servicos SET tempo = '". $timer ."' WHERE id_orcamento = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}