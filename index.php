<?php

include 'vendor/autoload.php';

use sistem\Nucleo\Connection;
use sistem\Nucleo\Helpers;

$conn = (new Connection)->getInstancia();

use Pecee\SimpleRouter\SimpleRouter;


try {
    SimpleRouter::setDefaultNamespace('sistem\Controlador');

    SimpleRouter::get(ROUTER_BASE. 'home/', 'SiteControl@index');
    SimpleRouter::get(ROUTER_BASE. 'oficina/', 'SiteControl@oficina');
    SimpleRouter::get(ROUTER_BASE.'404/', 'SiteControl@erro');
    SimpleRouter::get(ROUTER_BASE.'orcamentos/', 'SiteControl@orcamentos');
    SimpleRouter::post(ROUTER_BASE.'orcamento/criar', 'SiteControl@orcamentoAdd');
    SimpleRouter::get(ROUTER_BASE.'orcamento/create', 'SiteControl@orcamentoCreate');
    SimpleRouter::get(ROUTER_BASE.'orcamento/{id}', 'SiteControl@rotaOrcamento');
    SimpleRouter::get(ROUTER_BASE.'orcamento/deletar/{id}', 'SiteControl@deletarOrcamento');
    SimpleRouter::get(ROUTER_BASE.'update/orcamento/{id}', 'SiteControl@updateOrcamento');

    SimpleRouter::post(ROUTER_BASE.'buscar', 'SiteControl@buscar');
    SimpleRouter::get(ROUTER_BASE.'entregar/servico', 'SiteControl@entregaServico');
    SimpleRouter::get(ROUTER_BASE.'cancelar/entrega', 'SiteControl@cancelarEntrega');

    SimpleRouter::get(ROUTER_BASE. 'recibos/', 'SiteControl@recibos');
    SimpleRouter::post(ROUTER_BASE.'recibo/criar', 'SiteControl@reciboAdd');
    SimpleRouter::get(ROUTER_BASE.'recibo/create', 'SiteControl@reciboCreate');
    SimpleRouter::get(ROUTER_BASE.'recibo/{id}', 'SiteControl@rotaRecibo');
    SimpleRouter::get(ROUTER_BASE.'recibo/delete/{id}', 'SiteControl@deleteRecibo');
    SimpleRouter::post(ROUTER_BASE.'buscar/recibo', 'SiteControl@buscarRecibo');

    SimpleRouter::get(ROUTER_BASE.'documentos/', 'SiteControl@documentos');

    SimpleRouter::get(ROUTER_BASE.'cobranca/', 'SiteControl@cobranca');
    SimpleRouter::post(ROUTER_BASE.'cobranca/criar', 'SiteControl@cobrancaCriar');
    SimpleRouter::get(ROUTER_BASE.'cobranca/create', 'SiteControl@cobrancaCreate');
    SimpleRouter::get(ROUTER_BASE.'cobranca/{id}', 'SiteControl@rotaCobranca');
    SimpleRouter::get(ROUTER_BASE.'cobranca/deletar/{id}', 'SiteControl@deletarCobranca');
    SimpleRouter::post(ROUTER_BASE.'buscar/cobranca', 'SiteControl@buscarCobranca');

    SimpleRouter::get(ROUTER_BASE.'estoque/', 'SiteControl@estoque');
    SimpleRouter::get(ROUTER_BASE.'material/novo', 'SiteControl@novoMaterialEstoque');
    SimpleRouter::post(ROUTER_BASE.'cadastroMaterial/', 'SiteControl@cadastrarMaterial');
    SimpleRouter::post(ROUTER_BASE.'estoque/retirar/', 'SiteControl@tirarMaterial');
    SimpleRouter::post(ROUTER_BASE.'services/', 'SiteControl@services');

    SimpleRouter::get(ROUTER_BASE.'contador/{id}', 'SiteControl@contador');
    SimpleRouter::post(ROUTER_BASE.'timer/save', 'SiteControl@contadorSave');

    SimpleRouter::get(ROUTER_BASE.'analizes/', 'SiteControl@analize');
    SimpleRouter::get(ROUTER_BASE.'lucro/planilha', 'SiteControl@lucroPlanilha');

    SimpleRouter::get(ROUTER_BASE.'cor/editar', 'SiteControl@corEditar');

    SimpleRouter::get(ROUTER_BASE.'funcionarios/', 'SiteControl@funcionarios');
    SimpleRouter::get(ROUTER_BASE.'funcionario/novo', 'SiteControl@criarFuncionario');
    SimpleRouter::get(ROUTER_BASE.'funcionario/{id}', 'SiteControl@funcionarioRote');
    SimpleRouter::get(ROUTER_BASE.'funcionario/novo/servico', 'SiteControl@novoServicoFuncionario');
    SimpleRouter::get(ROUTER_BASE.'confirmacao/{id}', 'SiteControl@confirmacao');

    SimpleRouter::get(ROUTER_BASE.'novoFuncionario/', 'SiteControl@novoFuncionario');
    SimpleRouter::get(ROUTER_BASE.'editar/{id}', 'SiteControl@editarFuncionario');
    SimpleRouter::get(ROUTER_BASE.'salvar/{id}', 'SiteControl@salvarFuncionario');
    
    SimpleRouter::get(ROUTER_BASE.'comprovantes/', 'SiteControl@comprovantes');
    SimpleRouter::get(ROUTER_BASE.'comprovante/criar', 'SiteControl@comprovanteCreate');

    
    SimpleRouter::get(ROUTER_BASE.'gasto/{id}', 'SiteControl@gasto');
    SimpleRouter::get(ROUTER_BASE.'delete/gasto/{id}', 'SiteControl@deleteGasto');
    
    SimpleRouter::get(ROUTER_BASE.'servico/{id}-{idFuncionario}', 'SiteControl@servicoVer');
    SimpleRouter::get(ROUTER_BASE.'servicos/funcionarios', 'SiteControl@servicosProfile');
    SimpleRouter::get(ROUTER_BASE.'tarefa/criar', 'SiteControl@tarefaCriar');
    SimpleRouter::get(ROUTER_BASE.'create/tarefa', 'SiteControl@createTarefa');
    SimpleRouter::get(ROUTER_BASE.'deletar/{id}', 'SiteControl@deletarTarefa');
    SimpleRouter::post(ROUTER_BASE.'buscar/tarefa', 'SiteControl@buscarTarefa');

    SimpleRouter::post(ROUTER_BASE.'select/funcionarios', 'SiteControl@selectProfile');
    
    SimpleRouter::get(ROUTER_BASE.'delete/funcionario/{id}', 'SiteControl@deletarProfile');

    SimpleRouter::get(ROUTER_BASE.'investimentos', 'SiteControl@investimentos');
    SimpleRouter::get(ROUTER_BASE.'investimento/criar', 'SiteControl@investimentoAdd');
    SimpleRouter::get(ROUTER_BASE.'investimento/add', 'SiteControl@investimentoCriar');
    
    SimpleRouter::post(ROUTER_BASE.'lucrosM/consultar', 'SiteControl@consultarLucro');
    SimpleRouter::get(ROUTER_BASE.'gastofixo/novo', 'SiteControl@gastoFixoAdd');
    SimpleRouter::get(ROUTER_BASE.'gastofixo/editar', 'SiteControl@gastoFixoEditar');
    SimpleRouter::get(ROUTER_BASE.'gastoFixo/deletar/{id}', 'SiteControl@gastoFixoDeletar');
    SimpleRouter::get(ROUTER_BASE.'cadastroGastoFixo/', 'SiteControl@cadastroGastoFixo');

    SimpleRouter::post(ROUTER_BASE.'funcionario/presenca', 'SiteControl@batePonto');
    SimpleRouter::get(ROUTER_BASE.'deletar/batePonto/{id}-{idFuncionario}', 'SiteControl@deleteBatePonto');
    SimpleRouter::post(ROUTER_BASE.'consulta/pagamento', 'SiteControl@cunsultaPagamento');
    SimpleRouter::get(ROUTER_BASE.'pagar/pendencias/', 'SiteControl@pagarPendencia');
    SimpleRouter::post(ROUTER_BASE.'date/pesquisa', 'SiteControl@datePesquisa');


    SimpleRouter::start();

} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {
    Helpers::redirecionar('404/');
}
