<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeleteTarefa
{
    public function deletar(string $id)
    {
        $idInt = intval($id);

        $query = "DELETE FROM service_funcionario WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

    }

}