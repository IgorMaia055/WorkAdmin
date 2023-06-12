<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectBatePonto
{
    public function busca(string $id): array
    {
        $idInt = intval($id);

        $query = "SELECT * FROM bate_ponto WHERE id_funcionario = '". $idInt ."' ORDER BY id DESC";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

    public function buscaServico(string $id, string $opcaoPagamento)
    {
        $idInt = intval($id);
        $opcaoPagamentoInt = intval($opcaoPagamento);

        $query1 = "SELECT * FROM bate_ponto WHERE id_funcionario = '". $idInt ."' AND states = 1 ORDER BY id DESC";
        $result1 = Connection::getInstancia()->query($query1)->fetchAll();

        function contarDia($dados, $Pag) {
            $dataFormat = $dados[0]->data_trabalho;
            $dia = substr($dataFormat, 8, 2);
            $mesAtual = date('n') - 1;

            $finalMes = [
                0 => 31,
                1 => 28,
                2 => 31,
                3 => 30,
                4 => 31,
                5 => 30,
                6 => 31,
                7 => 31,
                8 => 30,
                9 => 31,
                10 => 30,
                11 => 31
            ];

            $valorFinal = 0;
            if($Pag + intval($dia) > $finalMes[$mesAtual]){
                for($i=0; $i < $Pag; $i++){
                    $diasContados = intval($dia) + $i;
    
                    if($diasContados >= $finalMes[$mesAtual]){
                        $valorFinal ++;
                    }
    
                }
            }else{
                for($i=0; $i < $Pag; $i++){
                    $diasContados = intval($dia) + $i;
    
                    if($diasContados >= $finalMes[$mesAtual]){
                        $valorFinal = $diasContados + 1;
                    }
    
                }
            }
            
            return $valorFinal;
        }

        if(count($result1) > 0){
            return contarDia($result1, $opcaoPagamentoInt);
        }else{
            $query2 = "SELECT data_trabalho FROM bate_ponto WHERE id_funcionario = '". $idInt ."' LIMIT 1";
            $result2 = Connection::getInstancia()->query($query2)->fetchAll();

            return contarDia($result2, $opcaoPagamentoInt);
        }

    }

    public function buscaData($id_funcionario, $date): array
    {
        $idInt = intval($id_funcionario);

        $query2 = "SELECT * FROM bate_ponto WHERE id_funcionario = '". $idInt ."' AND data_trabalho LIKE '%{$date}%' ORDER BY id DESC";
        $result2 = Connection::getInstancia()->query($query2)->fetchAll();

        return $result2;
    }
}