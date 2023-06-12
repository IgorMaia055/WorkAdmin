<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertEstoque
{
    public function insert(string $nome, string $loja, string $valor): void
    {
        $query = "INSERT INTO estoque (nome_material, valor, loja_fornecedora) VALUES ('". $nome ."', '". $valor ."', '". $loja ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}