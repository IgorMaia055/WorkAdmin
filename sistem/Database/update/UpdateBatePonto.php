<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateBatePonto
{
    public function update(string $id, string $data): void
    {
        $idInt = intval($id);

        $query = "UPDATE bate_ponto SET states = '". 1 ."' WHERE id_funcionario = '". $idInt ."' AND states = '". 0 ."' AND data_trabalho <= '". $data ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}