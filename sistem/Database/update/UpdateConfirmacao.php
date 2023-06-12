<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateConfirmacao
{
    public function update(string $id): void
    {
        $idInt = intval($id);

        $query = "UPDATE service_funcionario SET confirmacao = '". 0 ."' WHERE id_funcionario = '". $idInt ."' AND states = '". 1 ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}