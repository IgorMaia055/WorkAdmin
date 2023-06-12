<?php

namespace sistem\Database\update;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class UpdateFuncionario 
{
    public function update(string $id, array $dados): void
    {
        $idInt = intval($id);

            $query = "UPDATE funcionarios SET primeiro_nome = '". $dados['primeiroNome'] ."', segundo_nome = '". $dados['segundoNome'] ."', apelido = '". $dados['apelido'] ."', idade = '". $dados['idade'] ."', email = '". $dados['email'] ."', telefone = '". $dados['tel'] ."', endereco = '". $dados['endereco'] ."', cep = '". $dados['cep'] ."', funcao = '". $dados['funcao'] ."', tempotrabalho = '". $dados['tempoTrabalho'] ."', salario = '". $dados['salario'] ."', data_trabalho = '". $dados['dataInicial'] ."', senha = '".$dados['senha'] ."' WHERE id = '". $idInt ."'";
            $result = Connection::getInstancia()->query($query)->fetchAll();
    }
}