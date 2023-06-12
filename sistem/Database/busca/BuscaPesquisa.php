<?php

namespace sistem\Database\busca;

use sistem\Nucleo\Connection;

class BuscaPesquisa
{
    public function buscar(string $busc): array
    {
        $query = "SELECT * FROM orcamentos WHERE cliente LIKE '%{$busc}%' OR endereco LIKE '%{$busc}%' OR tel LIKE '%{$busc}%' OR veiculo LIKE '%{$busc}%' OR placa LIKE '%{$busc}%' OR total LIKE '%{$busc}%' OR dataR LIKE '%{$busc}%' ORDER BY id ASC";
        $result = Connection::getInstancia()->query($query)->fetchAll();

        return $result;
    }
    public function buscarLucros(string $id): array
    {
        $idInt = intval($id);
        $query = "SELECT * FROM lucros WHERE id_orcamento = '". $idInt ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

    public function buscarServico(string $id): array 
    {
        $idInt = intval($id);
        $query = "SELECT * FROM servicos WHERE id_orcamento = '". $idInt ."'";

        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }
}