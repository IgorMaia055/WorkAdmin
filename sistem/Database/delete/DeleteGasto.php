<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteGasto
{
    public function delete(string $id)
    {
        $idInt = intval($id);
        $query = "DELETE FROM gastos WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

}