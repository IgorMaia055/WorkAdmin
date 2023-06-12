<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateCor
{
    public function update(string $id, string $loja, string $nomeTinta, string $codigoTinta, string $tinta): void
    {
        $idInt = intval($id);

        $query = "UPDATE orcamentos SET nomeLojaTinta = '". $loja ."', nomeTinta = '". $nomeTinta . "', codigoTinta = '". $codigoTinta ."', cor = '". $tinta ."' WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}