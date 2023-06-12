<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteBatePonto
{
    public function delete(string $id)
    {
        $idInt = intval($id);
        $queryServise = "DELETE FROM bate_ponto WHERE id = '". $idInt ."'";
        $result2 = Connection::getInstancia()->query($queryServise)->fetchAll();
    }

}