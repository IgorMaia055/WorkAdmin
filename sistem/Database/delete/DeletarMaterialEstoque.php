<?php

namespace sistem\Database\delete;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class DeletarMaterialEstoque
{
    public function delete(string $id)
    {
        $idInt = intval($id);
        $query = "DELETE FROM estoque WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

    }

}