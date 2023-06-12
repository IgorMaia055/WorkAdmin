<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertInvestimento
{
    public function insert(string $nome, $fornecedor, $valor): void
    {
        $query = "INSERT INTO investimento (nome, fornecedor, valor, mes) VALUES ('". $nome ."', '". $fornecedor ."', '". $valor ."', '". date('n') - 1 ."')"; 

        $result = Connection::getInstancia()->query($query)->fetchAll();

    }
}