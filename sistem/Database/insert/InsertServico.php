<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertServico
{
    public function insertData(array $dados)
    {
        $selectId = "SELECT id FROM orcamentos ORDER BY id DESC";
        $resultId = Connection::getInstancia()->query($selectId)->fetchAll();
        $id = $resultId[0]->id;

        $query = "INSERT INTO servicos (id_orcamento, servico1, valor1, servico2, valor2, servico3, valor3, servico4, valor4, servico5, valor5, servico6, valor6, servico7, valor7, servico8, valor8, servico9, valor9, tempo) VALUES ('". $id ."', '". $dados['servico1'] ."', '". $dados['valor1'] ."', '". $dados['servico2'] ."', '". $dados['valor2'] ."', '". $dados['servico3'] ."', '". $dados['valor3'] ."', '". $dados['servico4'] ."', '". $dados['valor4'] ."', '". $dados['servico5'] ."', '". $dados['valor5'] ."', '". $dados['servico6'] ."', '". $dados['valor6'] ."', '". $dados['servico7'] ."', '". $dados['valor7'] ."', '". $dados['servico8'] ."', '". $dados['valor8'] ."', '". $dados['servico9'] ."', '". $dados['valor9'] ."', '00:00:00')";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

    public function update(array $dados, string $id): void 
    {
        $intval = intval($id);
        $query = "UPDATE servicos SET servico1 = '". $dados['servico1'] ."', valor1 = '". $dados['valor1'] ."', servico2 = '". $dados['servico2'] ."', valor2 = '". $dados['valor2'] ."', servico3 = '". $dados['servico3'] ."', valor3 = '". $dados['valor3'] ."', servico4 = '". $dados['servico4'] ."', valor4 = '". $dados['valor4'] ."', servico5 = '". $dados['servico5'] ."', valor5 = '". $dados['valor5'] ."', servico6 =  '". $dados['servico6'] ."', valor6 = '". $dados['valor6'] ."', servico7 = '". $dados['servico7'] ."', valor7 = '". $dados['valor7'] ."', servico8 = '". $dados['servico8'] ."', valor8 = '". $dados['valor8'] ."', servico9 = '". $dados['servico9'] ."', valor9 = '". $dados['valor9'] ."', tempo = '00:00:00' WHERE id_orcamento = '". $intval ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
    }

}