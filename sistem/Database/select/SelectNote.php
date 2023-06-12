<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectNote
{
    public function busca(): array
    {
        $query = "SELECT * FROM note ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }
    public function buscaNote(string $id): array
    {
        $query = "SELECT * FROM note WHERE id = '". $id ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}