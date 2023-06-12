<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertGasto
{
    public function insert(string $id_service, $nome_material, $gasto): void
    {
        $select = "SELECT id_orcamento, id_funcionario FROM service_funcionario WHERE id = '". intval($id_service) ."' ";
        $result1 = Connection::getInstancia()->query($select)->fetchAll();
        $id_orcamento = $result1[0]->id_orcamento;
        $id_funcionario = $result1[0]->id_funcionario;

        $dateNew = date('d/m/Y');

        $query = "INSERT INTO gastos (dateR, id_funcionario, id_servicofuncionario, id_orcamento, gasto, nome_material) VALUES ('". $dateNew ."', '". intval($id_funcionario) ."', '". intval($id_service) ."', '". intval($id_orcamento) ."', '". $gasto ."', '". $nome_material ."')"; 

        $result = Connection::getInstancia()->query($query)->fetchAll();

    }
}