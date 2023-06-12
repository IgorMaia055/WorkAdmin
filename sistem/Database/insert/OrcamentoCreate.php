<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class OrcamentoCreate
{
    public function insertData(array $dados)
    {
        $query = "INSERT INTO orcamentos (cliente, dataR, endereco, tel, veiculo, placa, ano, obs, previsao_entrega, totalPecas, maoObra, total, tipo) VALUES ('". $dados['nomeCliente'] ."','". $dados['dataR'] ."', '". $dados['endereco'] ."', '". $dados['fone'] ."', '". $dados['car'] ."','". $dados['placa'] ."', '". $dados['ano'] ."', '". $dados['obs'] ."', '". $dados['entrega'] ."', '". $dados['totalPecas'] ."', '". $dados['maoObre'] ."', '". $dados['total'] ."', '". intval($dados['tipo']) ."')";
        $result = Connection::getInstancia()->query($query)->fetchAll();

    }

    public function update(array $dados, string $id)
    {
        $idInt = intval($id);
        $query = "UPDATE orcamentos SET cliente = '". $dados['nomeCliente'] ."', dataR = '". $dados['dataR'] ."', endereco = '". $dados['endereco'] ."', tel = '". $dados['fone'] ."', veiculo = '". $dados['car'] ."', placa = '". $dados['placa'] ."', ano = '". $dados['ano'] ."', obs = '". $dados['obs'] ."', previsao_entrega = '". $dados['entrega'] ."', totalPecas = '". $dados['totalPecas'] ."', maoObra = '". $dados['maoObre'] ."', total = '". $dados['total'] ."', tipo = '". intval($dados['tipo']) ."' WHERE id = '". $idInt ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();

    }

}