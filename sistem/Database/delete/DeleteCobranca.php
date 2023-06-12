<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteCobranca
{
    public function deletar(string $id)
    {
        $idInt = intval($id);
        $query = "DELETE FROM cobranca WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

}