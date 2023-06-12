<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertGastoFixo
{
    public function insert($nome_material, $valor): void
    {
        $query = "INSERT INTO gasto_fixo (nome, valor) VALUES ('". $nome_material ."', '". $valor ."')"; 

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}