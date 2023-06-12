<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteRecibo
{
    public function delete(string $id)
    {
        $idInt = intval($id);
        $query = "DELETE FROM recibos WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

}