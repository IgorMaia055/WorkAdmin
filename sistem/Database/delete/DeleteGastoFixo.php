<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteGastoFixo
{
    public function delete(string $id)
    {
        $idInt = intval($id);
        $query = "DELETE FROM gasto_fixo WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

}