<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateStateProfile 
{
    public function update(string $id): void
    {
        $idInt = intval($id);

            $query = "UPDATE funcionarios SET states = '". 0 ."' WHERE id = '". $idInt ."'";
            $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}