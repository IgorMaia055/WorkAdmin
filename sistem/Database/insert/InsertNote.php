<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertNote
{
    public function insertData(string $title, string $texto, string $data): void
    {

        $query = "INSERT INTO note (title, `description`, dataR) VALUES ('". $title ."', '". $texto ."', '". $data ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}