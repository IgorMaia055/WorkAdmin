<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertLucro 
{
    public function insertData(array $dados): void
    {
      
        $selectId = "SELECT id FROM orcamentos ORDER BY id DESC";
        $resultId = Connection::getInstancia()->query($selectId)->fetchAll();
        $id = $resultId[0]->id;

        $maoObre = $dados['maoObre'];
        $valorpecaR = $dados['valorpecaR'];
        $valorpecaL = $dados['valorpecaL'];
        $valorMaterial = $dados['valorMaterial'];
        $valorLavagem = $dados['valorLavagem'];

        $lucro = $dados['lucro'];

        $tipo = $dados['tipo'];

        $query = "INSERT INTO lucros (id_orcamento, maoObra, valorPecaR, valorPecaL, valorMaterial, valorLavagem, lucro, tipo, mes, ano) VALUES ('". $id ."', '". $maoObre ."', '". $valorpecaR ."', '". $valorpecaL ."', '". $valorMaterial ."', '". $valorLavagem ."', '". $lucro ."','". intval($tipo) ."', '". date('n') - 1 ."', '". date('Y') ."')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

    public function update(array $dados, string $id): void 
    {
        $intval = intval($id);
        $maoObre = $dados['maoObre'];
        $valorpecaR = $dados['valorpecaR'];
        $valorpecaL = $dados['valorpecaL'];
        $valorMaterial = $dados['valorMaterial'];
        $valorLavagem = $dados['valorLavagem'];

        $lucro = $dados['lucro'];

        $tipo = $dados['tipo'];

        $query = "UPDATE lucros SET maoObra = '". $maoObre ."', valorPecaR = '". $valorpecaR ."', valorPecaL = '". $valorpecaL ."', valorMaterial = '". $valorMaterial ."', valorLavagem = '". $valorLavagem ."', lucro = '". $lucro ."', tipo = '". intval($tipo) ."', mes = '". date('n') - 1 ."', ano = '". date('Y') ."' WHERE id_orcamento = '". $intval ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}