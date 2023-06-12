<?php

namespace sistem\Database\insert;

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

class InsertFuncionario
{
    public function insert(array $dados): void
    {
        $query = "INSERT INTO funcionarios (primeiro_nome, segundo_nome, apelido, idade, email, telefone, endereco, cep, funcao, tempotrabalho, salario, data_trabalho, senha) VALUES ('". $dados['primeiroNome'] ."', '". $dados['segundoNome'] ."', '". $dados['apelido'] ."', '". $dados['idade'] ."', '". $dados['email'] ."', '". $dados['tel'] ."', '". $dados['endereco'] ."', '". $dados['cep'] ."', '". $dados['funcao'] ."', '". $dados['tempoTrabalho'] ."', '". $dados['salario'] ."', '". $dados['dataInicial'] ."', '".$dados['senha'] ."')"; 
        $result = Connection::getInstancia()->query($query)->fetchAll();

        $query3 = "SELECT * FROM funcionarios WHERE senha = '". $dados['senha'] ."'";
        $result3 = Connection::getInstancia()->query($query3)->fetchAll();

        $query2 = "INSERT INTO pontos_funcionario (id_funcionario, total_tarefas) VALUES ('". $result3[0]->id ."', '". 0 ."')"; 
        $result2 = Connection::getInstancia()->query($query2)->fetchAll();
    }
}