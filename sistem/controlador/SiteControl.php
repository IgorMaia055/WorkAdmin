<?php

/**
 * Classe para a controlação da aplicação, com ela todas as rotas são conectadas, dados são encontrados e arquivos html são renderizados atravez do twig template. 
 * @author Igor Maia <igormaia055@gmail.com>
 * @copyright Copyright (c) 2023
 */

namespace sistem\Controlador;

// Classes bases
use sistem\Nucleo\Controlador;
use sistem\Nucleo\Helpers;

//Classes para buscar dados no banco
use sistem\Database\busca\BuscaPesquisa;
use sistem\Database\busca\BuscaRecibo;
use sistem\Database\busca\Busca;
use sistem\Database\busca\BuscaCobranca;

//Classes para selecionar dados do banco
use sistem\Database\select\SelectOrcamentos;
use sistem\Database\select\SelectRecibos;
use sistem\Database\select\SelectLucros;
use sistem\Database\select\SelectDocumentos;
use sistem\Database\select\SelectCobranca;
use sistem\Database\select\SelectTempo;
use sistem\Database\select\SelectNote;
use sistem\Database\select\SelectFuncionarios;
use sistem\Database\select\SelectServicos;
use sistem\Database\select\SelectGastos;
use sistem\Database\select\SelectTotal;
use sistem\Database\select\SelectMateriaisEstoque;
use sistem\Database\select\SelectInvestimento;
use sistem\Database\select\SelectLucrosMes;
use sistem\Database\select\SelectGastosFixos;
use sistem\Database\select\SelectBatePonto;

//Classes para inserir dados nas tabelas do banco  
use sistem\Database\insert\OrcamentoCreate;
use sistem\Database\insert\InsertServico;
use sistem\Database\insert\InsertLucro;
use sistem\Database\insert\InsertRecibo;
use sistem\Database\insert\InsertCobranca;
use sistem\Database\insert\InsertNote;
use sistem\Database\insert\InsertFuncionario;
use sistem\Database\insert\InsertTarefa;
use sistem\Database\insert\InsertEstoque;
use sistem\Database\insert\InsertGasto;
use sistem\Database\insert\InsertInvestimento;
use sistem\Database\insert\InsertGastoFixo;
use sistem\Database\insert\InsertBatePonto;

//Classe para renovar um dado do banco
use sistem\Database\update\UpdateOrcamento;
use sistem\Database\update\UpdateTimer;
use sistem\Database\update\UpdateCor;
use sistem\Database\update\UpdateFuncionario;
use sistem\Database\update\UpdateConfirmacao;
use sistem\Database\update\UpdateStateProfile;
use sistem\Database\update\UpdateBatePonto;

//Classes para deleter dados do banco
use sistem\Database\delete\DeletarOrcamento;
use sistem\Database\delete\DeleteRecibo;
use sistem\Database\delete\DeleteCobranca;
use sistem\Database\delete\DeleteTarefa;
use sistem\Database\delete\DeletarMaterialEstoque;
use sistem\Database\delete\DeleteGasto;
use sistem\Database\delete\DeleteBatePonto;
use sistem\Database\delete\DeleteGastoFixo;

class SiteControl extends Controlador
{

    public function __construct()
    {
        parent::__construct('views/');
    }

    public function login(): void 
    {
      echo $this->template->renderizar('login.html', []);
    }

    //Renderiza e manda um array de informações para a página inicial
    public function index(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

        $lucros = (new SelectLucros)->busca();
        $orcamentos = (new SelectOrcamentos)->busca(true);
        $ano = date('Y');

        echo $this->template->renderizar('dashboard.html', [
           'lucros' => $lucros,
           'orcamentos' => $orcamentos,
           'ano' => $ano,

           'recentes' => true,
           'orcamentosRecentes' => $orcamentosRecentes,
           'recibosRecentes' => $recibosRecentes
        ]);
    }

    public function oficina(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();
              echo $this->template->renderizar('autopinturamaia.html', [
      
                 'recentes' => true,
                 'orcamentosRecentes' => $orcamentosRecentes,
                 'recibosRecentes' => $recibosRecentes
              ]);
    }

    public function erro(): void 
    {
        echo $this->template->renderizar('404.html', []);
    }
    public function orcamentos(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

        $orcamentos = (new SelectOrcamentos)->busca();

        echo $this->template->renderizar('orcamentos.html', [
            'orcamentos' => $orcamentos,

            'recentes' => true,
           'orcamentosRecentes' => $orcamentosRecentes,
           'recibosRecentes' => $recibosRecentes
        ]);
    }
    public function orcamentoAdd(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

        echo $this->template->renderizar('orcamentoAdd.html', [
            'dados' => false,

            'recentes' => true,
           'orcamentosRecentes' => $orcamentosRecentes,
           'recibosRecentes' => $recibosRecentes
        ]);
    }
    public function orcamentoCreate(): void 
    {
        $nomeCliente =  filter_input(INPUT_GET,'nomeCliente', FILTER_DEFAULT);
        $data =         filter_input(INPUT_GET,'data', FILTER_DEFAULT);
        $endereco =     filter_input(INPUT_GET,'endereco', FILTER_DEFAULT);
        $fone =         filter_input(INPUT_GET,'fone', FILTER_DEFAULT);
        $car =          filter_input(INPUT_GET,'car', FILTER_DEFAULT);
        $ano =          filter_input(INPUT_GET,'ano', FILTER_DEFAULT);
        $placa =          filter_input(INPUT_GET,'placa', FILTER_DEFAULT);
        $servico1 =     filter_input(INPUT_GET,'servico1', FILTER_DEFAULT);
        $valor1 =       filter_input(INPUT_GET,'valor1', FILTER_DEFAULT);
        $servico2 =     filter_input(INPUT_GET,'servico2', FILTER_DEFAULT);
        $valor2 =       filter_input(INPUT_GET,'valor2', FILTER_DEFAULT);
        $servico3 =     filter_input(INPUT_GET,'servico3', FILTER_DEFAULT);
        $valor3 =       filter_input(INPUT_GET,'valor3', FILTER_DEFAULT);
        $servico4 =     filter_input(INPUT_GET,'servico4', FILTER_DEFAULT);
        $valor4 =       filter_input(INPUT_GET,'valor4', FILTER_DEFAULT);
        $servico5 =     filter_input(INPUT_GET,'servico5', FILTER_DEFAULT);
        $valor5 =       filter_input(INPUT_GET,'valor5', FILTER_DEFAULT);
        $servico6 =     filter_input(INPUT_GET,'servico6', FILTER_DEFAULT);
        $valor6 =       filter_input(INPUT_GET,'valor6', FILTER_DEFAULT);
        $servico7 =     filter_input(INPUT_GET,'servico7', FILTER_DEFAULT);
        $valor7 =       filter_input(INPUT_GET,'valor7', FILTER_DEFAULT);
        $servico8 =     filter_input(INPUT_GET,'servico8', FILTER_DEFAULT);
        $valor8 =       filter_input(INPUT_GET,'valor8', FILTER_DEFAULT);
        $servico9 =     filter_input(INPUT_GET,'servico9', FILTER_DEFAULT);
        $valor9 =       filter_input(INPUT_GET,'valor9', FILTER_DEFAULT);
        $obs =          filter_input(INPUT_GET,'obs', FILTER_DEFAULT);
        $entrega =      filter_input(INPUT_GET,'entrega', FILTER_DEFAULT);
        $totalPecas =   filter_input(INPUT_GET,'totalPecas', FILTER_DEFAULT);
        $maoObre =      filter_input(INPUT_GET,'maoObre', FILTER_DEFAULT);
        $total =        filter_input(INPUT_GET,'total', FILTER_DEFAULT);

        $valorpecaR =   filter_input(INPUT_GET,'valorpecaR', FILTER_DEFAULT);
        $valorpecaL =   filter_input(INPUT_GET,'valorpecaL', FILTER_DEFAULT);
        $valorMaterial =   filter_input(INPUT_GET,'valormaterial', FILTER_DEFAULT);
        $valorLavagem =   filter_input(INPUT_GET,'valorLavagem', FILTER_DEFAULT);

        $lucro =        filter_input(INPUT_GET,'lucro', FILTER_DEFAULT);
        $tipoServico =  filter_input(INPUT_GET, 'tipoServico', FILTER_DEFAULT);


        $dados = array(
                'nomeCliente' => $nomeCliente,
                'dataR' => $data,
                'endereco' => $endereco,
                'fone' => $fone,
                'car' => $car,
                'ano' => $ano,
                'placa' => $placa,
                'obs' => $obs,
                'entrega' => $entrega,
                'totalPecas' => $totalPecas,
                'maoObre' => $maoObre,
                'total' => $total,
                'tipo' => $tipoServico
        );

        $service = array(
                'servico1' => $servico1,
                'valor1' => $valor1,
                'servico2' => $servico2,
                'valor2' => $valor2,
                'servico3' => $servico3,
                'valor3' => $valor3,
                'servico4' => $servico4,
                'valor4' => $valor4,
                'servico5' => $servico5,
                'valor5' => $valor5,
                'servico6' => $servico6,
                'valor6' => $valor6,
                'servico7' => $servico7,
                'valor7' => $valor7,
                'servico8' => $servico8,
                'valor8' => $valor8,
                'servico9' => $servico9,
                'valor9' => $valor9,
        );
        
        $lucros = array(
            'maoObre' => $maoObre,
            'valorpecaR' => $valorpecaR,
            'valorpecaL' => $valorpecaL,
            'valorMaterial' => $valorMaterial,
            'valorLavagem' => $valorLavagem,
            'lucro' => $lucro,
            'tipo' => $tipoServico
        );


        (new OrcamentoCreate)->insertData($dados);
        (new InsertServico)->insertData($service);
        (new InsertLucro)->insertData($lucros);

        Helpers::redirecionar('orcamentos/');
    }

    public function entregaServico(): void 
    {
      $id = filter_input(INPUT_GET,'id_orcamento', FILTER_DEFAULT);
      $dataEntrega = filter_input(INPUT_GET,'dataEntrega', FILTER_DEFAULT);

      (new UpdateOrcamento)->states($id, $dataEntrega);
      Helpers::redirecionar('orcamentos/');
    }

    public function cancelarEntrega(): void 
    {
      $id = filter_input(INPUT_GET,'id_orcamento', FILTER_DEFAULT);

      (new UpdateOrcamento)->entrega($id);
      Helpers::redirecionar('orcamentos/');
    }

    public function rotaOrcamento(string $id)
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

        $orcamento = (new SelectOrcamentos)->buscaOrcamento($id);
        $lucros = (new SelectOrcamentos)->buscaLucroOrcamento($id);
        $servicos = (new SelectOrcamentos)->buscaServicoOrcamento($id);

        echo $this->template->renderizar('orcamentoAdd.html', [
            'orcamentos' => $orcamento,
            'lucros' => $lucros,
            'servicos' => $servicos,
            'dados' => true,

            'recentes' => true,
            'orcamentosRecentes' => $orcamentosRecentes,
            'recibosRecentes' => $recibosRecentes
        ]);
    }
    
    public function deletarOrcamento(string $id)
    {
        (new DeletarOrcamento)->insertData($id);
        Helpers::redirecionar('orcamentos/');
    }

    public function updateOrcamento(string $id): void 
    {
      $nomeCliente =  filter_input(INPUT_GET,'nomeCliente', FILTER_DEFAULT);
      $data =         filter_input(INPUT_GET,'data', FILTER_DEFAULT);
      $endereco =     filter_input(INPUT_GET,'endereco', FILTER_DEFAULT);
      $fone =         filter_input(INPUT_GET,'fone', FILTER_DEFAULT);
      $car =          filter_input(INPUT_GET,'car', FILTER_DEFAULT);
      $ano =          filter_input(INPUT_GET,'ano', FILTER_DEFAULT);
      $placa =          filter_input(INPUT_GET,'placa', FILTER_DEFAULT);
      $servico1 =     filter_input(INPUT_GET,'servico1', FILTER_DEFAULT);
      $valor1 =       filter_input(INPUT_GET,'valor1', FILTER_DEFAULT);
      $servico2 =     filter_input(INPUT_GET,'servico2', FILTER_DEFAULT);
      $valor2 =       filter_input(INPUT_GET,'valor2', FILTER_DEFAULT);
      $servico3 =     filter_input(INPUT_GET,'servico3', FILTER_DEFAULT);
      $valor3 =       filter_input(INPUT_GET,'valor3', FILTER_DEFAULT);
      $servico4 =     filter_input(INPUT_GET,'servico4', FILTER_DEFAULT);
      $valor4 =       filter_input(INPUT_GET,'valor4', FILTER_DEFAULT);
      $servico5 =     filter_input(INPUT_GET,'servico5', FILTER_DEFAULT);
      $valor5 =       filter_input(INPUT_GET,'valor5', FILTER_DEFAULT);
      $servico6 =     filter_input(INPUT_GET,'servico6', FILTER_DEFAULT);
      $valor6 =       filter_input(INPUT_GET,'valor6', FILTER_DEFAULT);
      $servico7 =     filter_input(INPUT_GET,'servico7', FILTER_DEFAULT);
      $valor7 =       filter_input(INPUT_GET,'valor7', FILTER_DEFAULT);
      $servico8 =     filter_input(INPUT_GET,'servico8', FILTER_DEFAULT);
      $valor8 =       filter_input(INPUT_GET,'valor8', FILTER_DEFAULT);
      $servico9 =     filter_input(INPUT_GET,'servico9', FILTER_DEFAULT);
      $valor9 =       filter_input(INPUT_GET,'valor9', FILTER_DEFAULT);
      $obs =          filter_input(INPUT_GET,'obs', FILTER_DEFAULT);
      $entrega =      filter_input(INPUT_GET,'entrega', FILTER_DEFAULT);
      $totalPecas =   filter_input(INPUT_GET,'totalPecas', FILTER_DEFAULT);
      $maoObre =      filter_input(INPUT_GET,'maoObre', FILTER_DEFAULT);
      $total =        filter_input(INPUT_GET,'total', FILTER_DEFAULT);

      $valorpecaR =   filter_input(INPUT_GET,'valorpecaR', FILTER_DEFAULT);
      $valorpecaL =   filter_input(INPUT_GET,'valorpecaL', FILTER_DEFAULT);
      $valorMaterial =   filter_input(INPUT_GET,'valormaterial', FILTER_DEFAULT);
      $valorLavagem =   filter_input(INPUT_GET,'valorLavagem', FILTER_DEFAULT);

      $lucro =        filter_input(INPUT_GET,'lucro', FILTER_DEFAULT);
      $tipoServico =  filter_input(INPUT_GET, 'tipoServico', FILTER_DEFAULT);


      $dados = array(
              'nomeCliente' => $nomeCliente,
              'dataR' => $data,
              'endereco' => $endereco,
              'fone' => $fone,
              'car' => $car,
              'ano' => $ano,
              'placa' => $placa,
              'obs' => $obs,
              'entrega' => $entrega,
              'totalPecas' => $totalPecas,
              'maoObre' => $maoObre,
              'total' => $total,
          'tipo' => $tipoServico
      );

      $service = array(
              'servico1' => $servico1,
              'valor1' => $valor1,
              'servico2' => $servico2,
              'valor2' => $valor2,
              'servico3' => $servico3,
              'valor3' => $valor3,
              'servico4' => $servico4,
              'valor4' => $valor4,
              'servico5' => $servico5,
              'valor5' => $valor5,
              'servico6' => $servico6,
              'valor6' => $valor6,
              'servico7' => $servico7,
              'valor7' => $valor7,
              'servico8' => $servico8,
              'valor8' => $valor8,
              'servico9' => $servico9,
              'valor9' => $valor9,
      );
      
      $lucros = array(
          'maoObre' => $maoObre,
          'valorpecaR' => $valorpecaR,
          'valorpecaL' => $valorpecaL,
          'valorMaterial' => $valorMaterial,
          'valorLavagem' => $valorLavagem,
          'lucro' => $lucro,
          'tipo' => $tipoServico
      );


      (new OrcamentoCreate)->update($dados, $id);
      (new InsertServico)->update($service, $id);
      (new InsertLucro)->update($lucros, $id);

      Helpers::redirecionar('orcamentos/');
    }

    public function buscar(): void 
    {
        $busca = filter_input(INPUT_POST,'busca', FILTER_DEFAULT);
        
        $buscs = (new Busca)->buscar($busca);

        foreach($buscs as $busc){
                // echo "<a class='list-group-item list-group-item-action' href=". Helpers::url('post/'. $busc->id ) ."> $busc->title </a>";
                $btn = ($busc->states != 0 ? "
                <input type='text' id='urlStatus". $busc->id ."' value=". Helpers::url('orcamento/status/'. $busc->id) ." hidden>
              <button class='position-relative states btnStatus". $busc->id ."' data-bs-toggle='modal' data-bs-target='#cancelar". $busc->id ."' >
                <span class='position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle spanStatus". $busc->id ."' id='1'>
                  <span class='visually-hidden'>New alerts</span>
                </span>
              </button>
                " : "
                <input type='text' id='urlStatus". $busc->id ."' value=". Helpers::url('orcamento/status/'. $busc->id) ." hidden>
              <button class='position-relative states btnStatus". $busc->id ."' data-bs-toggle='modal' data-bs-target='#entregar". $busc->id ."'>

                <span class='position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle spanStatus". $busc->id ."' id='0'>
                  <span class='visually-hidden'>New alerts</span>
                </span>
              </button>
                ");
                echo "
                <tr>
            <td>
            <a href=". Helpers::url('orcamento/'.$busc->id) .">
                👁
              </a>
            </td>
            <td>
            <a href=". Helpers::url('contador/'.$busc->id) .">
              ⏱
            </a>
           </td>
            <td>". $busc->total ."</td>
            <td>". $busc->cliente ."</td>
            <td>". $busc->tel ."</td>
            <td>". $busc->veiculo ."</td>
            <td>". $busc->placa ."</td>
            <td>". $busc->ano ."</td>
            <td>". $busc->dataR ."</td>
            <td>". $busc->data_entrega ."</td>bt
            <td>
              <div class='corCarro cor". $busc->id ." my-1' data-bs-toggle='modal' data-bs-target='#exampleModal". $busc->id ."'></div>
             
            </td>
            <td>
            ". $btn ."
            </td>
          </tr>
            <script>
                if(". $busc->cor ." != ''){
                document.querySelector('.cor". $busc->id ."').style.backgroundColor = ". $busc->cor ."
              }else{
                document.querySelector('.cor". $busc->id ."').style.backgroundColor = 'white'
              }
            </script>

    
<!-- Modal -->
<div class='modal fade' id='exampleModal". $busc->id ."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Cor do carro</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <form id='corEditar' action=". Helpers::url('cor/editar') .">
      <div class='modal-body'>
          <input type='text' name='id' value=". $busc->id ." hidden>

          <div class='mb-3'>
            <label for='loja' class='form-label'>Nome da loja fornecedora</label>
            <input type='text' name='loja' value=". $busc->nomeLojaTinta ." class='form-control' id='loja'>
          </div>
          <div class='mb-3'>
            <label for='tintaNome' class='form-label'>Nome da tinta</label>
            <textarea class='form-control' name='tintaNome' id='tintaNome' rows='3'>". $busc->nomeTinta ."</textarea>
          </div>
          <div class='mb-3'>
            <label for='codigo' class='form-label'>Código da tinta</label>
            <input type='text' name='codigo' value=". $busc->codigoTinta ." class='form-control' id='codigo'>
          </div>
        </div>
        <div class='modal-footer'>
          <label for='tinta". $busc->id ."'>Cor aproximada</label>
          <input type='color' name='tinta' id='tinta". $busc->id ."' style='margin-right: 10rem;'>
          <div class='btn btn-secondary' data-bs-dismiss='modal'>Close</div>
          <button class='btn btn-primary'>Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal cancelar entrega -->
<div class='modal fade' id='cancelar". $busc->id ."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Tem certeza de que deseja cancelar a entrega?</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <form action=". Helpers::url('cancelar/entrega') .">
      <div class='modal-body'>
        <input type='text' name='id_orcamento' value=". $busc->id ." hidden>
        Ao clicar em cancelar a entrega será cancelada
      </div>
        <div class='modal-footer'>
          <div class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</div>
          <button class='btn btn-danger'>Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal data entrega -->
<div class='modal fade' id='entregar". $busc->id ."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>O veículo foi realmente entregue?</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <form action=". Helpers::url('entregar/servico') .">
      <div class='modal-body'>
        <input type='text' name='id_orcamento' value=". $busc->id ." hidden>
          <label for='dataEntrega' class='form-label'>Data de entrega</label>

          <input type='text' class='form-control' name='dataEntrega' value=". Helpers::dateNew() .">
      </div>
        <div class='modal-footer'>
          <div class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</div>
          <button class='btn btn-success'>Entregar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
     if(". $busc->cor ." != ''){
                document.querySelector('#tinta". $busc->id ."').value = ". $busc->cor ."
              }else{
                document.querySelector('#tinta". $busc->id ."').value = '#ffffff'
              }
</script>
          </tr>

          <script>
              $(document).ready(function (){
          $('.btnStatus". $busc->id ."').click(function (){
                  $.ajax({
                      url: $('#urlStatus". $busc->id ."').val(),
                      method: 'POST',
                      success: function (data) {
                        let btn = document.querySelector('.spanStatus". $busc->id ."')
    
                        if(btn.id === '0'){
                          btn.classList = 'position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle spanStatus". $busc->id ."'
                          btn.id = '1'
                        }else{
                          btn.classList = 'position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle spanStatus". $busc->id ."'
                          btn.id = '0'
                        }
                      }
                  })
          })
        })
    </script>
                ";
        }

    }

    //Rotas para recibos

    public function recibos(): void
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $recibos = (new SelectRecibos)->busca();
      echo $this->template->renderizar('recibos.html', [
        'recibos' => $recibos,

        'recentes' => true,
            'orcamentosRecentes' => $orcamentosRecentes,
            'recibosRecentes' => $recibosRecentes
    ]);
    }
    
    public function reciboAdd(): void 
    {
                  //Documentos Recentes para o navbar
                  $orcamentosRecentes = (new SelectDocumentos)->busca();
                  $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      echo $this->template->renderizar('reciboAdd.html', [
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function reciboCreate(): void 
    {
      $cliente =  filter_input(INPUT_GET,'cliente', FILTER_DEFAULT);
      $valorText =  filter_input(INPUT_GET,'valorText', FILTER_DEFAULT);
      $servico =  filter_input(INPUT_GET,'servico', FILTER_DEFAULT);
      $servico2 =  filter_input(INPUT_GET,'servico2', FILTER_DEFAULT);
      $valor =  filter_input(INPUT_GET,'valor', FILTER_DEFAULT);
      $data =  filter_input(INPUT_GET,'data', FILTER_DEFAULT);

      $reciboInfo = array(
        'cliente' => $cliente,
        'valorText' => $valorText,
        'servico' => $servico,
        'servico2' => $servico2,
        'valor' => $valor,
        'data' => $data
      );

      (new InsertRecibo)->insertData($reciboInfo);
      Helpers::redirecionar('recibos/');
    }

    public function rotaRecibo(string $id): void
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $recibo = (new SelectRecibos)->buscaRecibo($id);

      echo $this->template->renderizar('reciboAdd.html', [
        'dadosRecibo' => $recibo,
        'dados' => true,

        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function deleteRecibo(string $id): void 
    {
      (new DeleteRecibo)->delete($id);
      Helpers::redirecionar('recibos/');
    }
    
    public function buscarRecibo(): void 
    {
      $busca = filter_input(INPUT_POST,'busca', FILTER_DEFAULT);
      $buscs = (new BuscaRecibo)->buscar($busca);

      foreach($buscs as $busc){
        echo "
        <tr>
            <td>
              <a href=". Helpers::url('recibo/'. $busc->id) .">
                👁
              </a>
            </td>
            <td>". $busc->valor ."</td>
            <td>". $busc->cliente ."</td>
            <td>". $busc->servico ."</td>
            <td>". $busc->data ."</td>
        </tr>
        ";
}
    }

    public function documentos(): void 
    {
       //Documentos Recentes para o navbar
       $orcamentosRecentes = (new SelectDocumentos)->busca();
       $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

       echo $this->template->renderizar('documentos.html', [
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function cobranca(): void 
    {
       //Documentos Recentes para o navbar
       $orcamentosRecentes = (new SelectDocumentos)->busca();
       $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

       $cobrancas = (new SelectCobranca)->busca(false, 0);

       echo $this->template->renderizar('cobranca.html', [
        'cobrancas' => $cobrancas,
        
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function cobrancaCriar(): void 
    {
             //Documentos Recentes para o navbar
             $orcamentosRecentes = (new SelectDocumentos)->busca();
             $recibosRecentes = (new SelectDocumentos)->buscaRecibo();
      
             echo $this->template->renderizar('cobrancaCriar.html', [
              'recentes' => true,
              'orcamentosRecentes' => $orcamentosRecentes,
              'recibosRecentes' => $recibosRecentes
            ]);
    }

    public function cobrancaCreate(): void 
    {
      $devedor =  filter_input(INPUT_GET,'devedor', FILTER_DEFAULT);
      $endereco =  filter_input(INPUT_GET,'endereco', FILTER_DEFAULT);
      $tel =  filter_input(INPUT_GET,'tel', FILTER_DEFAULT);
      $servico =  filter_input(INPUT_GET,'servico', FILTER_DEFAULT);
      $servico2 =  filter_input(INPUT_GET,'servico2', FILTER_DEFAULT);
      $cobranca =  filter_input(INPUT_GET,'cobranca', FILTER_DEFAULT);
      $total =  filter_input(INPUT_GET,'total', FILTER_DEFAULT);

      $dados = array(
        'devedor' => $devedor,
        'endereco' => $endereco,
        'tel' => $tel,
        'servico' => $servico,
        'servico2' => $servico2,
        'cobranca' => $cobranca,
        'total' => $total
      );

      (new InsertCobranca)->insert($dados);
      Helpers::redirecionar('cobranca/');
    }

    public function rotaCobranca(string $id): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $cobranca = (new SelectCobranca)->busca(true, $id);

        echo $this->template->renderizar('cobrancaCriar.html', [
            'cobrancas' => $cobranca, 
            'dados' => true,

            'recentes' => true,
            'orcamentosRecentes' => $orcamentosRecentes,
            'recibosRecentes' => $recibosRecentes
        ]);
    }

    public function deletarCobranca(string $id): void 
    {
      (new DeleteCobranca)->deletar($id);
      Helpers::redirecionar('cobranca/');
    }

    public function buscarCobranca():void 
    {
      $busca = filter_input(INPUT_POST,'busca', FILTER_DEFAULT);
        
      $buscs = (new BuscaCobranca)->buscar($busca);

      foreach($buscs as $busc){
              echo "
              <tr>
          <td>
          <a href=". Helpers::url('cobranca/'.$busc->id) .">
              👁
            </a>
          </td>
          <td>". $busc->valorCobranca ."</td>
            <td>". $busc->cliente ."</td>
            <td>". $busc->tel ."</td>
            <td>". $busc->endereco ."</td>
            <td>". $busc->servico ."</td>
            <td>". $busc->valor ."</td>
        </tr>
              ";
      }
    }


    public function contador(string $id): void 
    {
      $tempo = (new SelectTempo)->buscar($id);
      $orcamento = (new SelectOrcamentos)->buscaOrcamento($id);

      echo $this->template->renderizar('timer.html', [
        'timer' => $tempo[0]->tempo,
        'id' => $id,
        'veiculo' => $orcamento[0]->veiculo,
     ]);
    }

    public function contadorSave(): void 
    {
      $timer = $_POST['time'];
      $id = $_POST['id'];
      (new UpdateTimer)->update($timer, $id);
    }

    public function analize(): void 
    {
       //Documentos Recentes para o navbar
       $orcamentosRecentes = (new SelectDocumentos)->busca();
       $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

       $lucros = (new SelectLucros)->busca();
       $orcamentos = (new SelectOrcamentos)->busca(true);
       $todosOrcamentos = (new SelectOrcamentos)->busca();

       $total_p_razoavel = (new SelectTotal)->busca(6);
       $total_p_inteiro = (new SelectTotal)->busca(5);
       $total_ajustes = (new SelectTotal)->busca(4);
       $total_restauracao = (new SelectTotal)->busca(3);
       $total_estetica = (new SelectTotal)->busca(2);
       $total_reforma = (new SelectTotal)->busca(1);

       echo $this->template->renderizar('analizes.html', [
        'lucros' => $lucros,
        'orcamentos' => count($orcamentos),
        'quantiaLucro' => count($lucros),
        'todosOrcamentos' => count($todosOrcamentos),
        'total_p_razoavel' => $total_p_razoavel,
        'total_p_inteiro' => $total_p_inteiro,
        'total_ajustes' => $total_ajustes,
        'total_restauracao' => $total_restauracao,
        'total_estetica' => $total_estetica,
        'total_reforma' => $total_reforma,
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function corEditar(): void 
    {
      $id = filter_input(INPUT_GET,'id', FILTER_DEFAULT);
      $loja = filter_input(INPUT_GET,'loja', FILTER_DEFAULT);
      $tintaNome = filter_input(INPUT_GET,'tintaNome', FILTER_DEFAULT);
      $codigo = filter_input(INPUT_GET,'codigo', FILTER_DEFAULT);
      $tinta = filter_input(INPUT_GET,'tinta', FILTER_DEFAULT);

      (new UpdateCor)->update($id, $loja, $tintaNome, $codigo, $tinta);
      Helpers::redirecionar('orcamentos/');
    }

    public function funcionarios(): void 
    {
       //Documentos Recentes para o navbar
       $orcamentosRecentes = (new SelectDocumentos)->busca();
       $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

       $funcionarios = (new SelectFuncionarios)->busca();

       echo $this->template->renderizar('funcionarios.html', [
        'funcionarios' => $funcionarios,
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function funcionarioRote(string $id):void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $funcionario = (new SelectFuncionarios)->buscaFuncionario($id);
      $batePonto = (new SelectBatePonto)->busca($id);

        $servicos = (new SelectServicos)->buscaTudo($id);
        $servicos2 = (new SelectServicos)->buscaPendencia($id);

        $gastos = (new SelectGastos)->buscaTudo($id);

      echo $this->template->renderizar('funcionarioRote.html', [
       'funcionarioDados' => $funcionario,
       'batePonto' => $batePonto,
       'servicos' => $servicos,
       'servicos2' => $servicos2,
       'gastos' => $gastos,

       'recentes' => true,
       'orcamentosRecentes' => $orcamentosRecentes,
       'recibosRecentes' => $recibosRecentes
     ]);
    }

    public function criarFuncionario(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      echo $this->template->renderizar('criarFuncionario.html', [
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function editarFuncionario(string $id):void 
    {

      $funcionario = (new SelectFuncionarios)->buscaFuncionario($id);

            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();
      
            echo $this->template->renderizar('criarFuncionario.html', [
              'dados' => true,
              'funcionario' => $funcionario,
              'id' => $id,
       
              'recentes' => true,
              'orcamentosRecentes' => $orcamentosRecentes,
              'recibosRecentes' => $recibosRecentes
            ]);
    }

    public function salvarFuncionario(string $id):void 
    {
      $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

      $funcionario = (new UpdateFuncionario)->update($id, $dados);

      Helpers::redirecionar('funcionarios/');
    }
    
    public function novoFuncionario(): void 
    {
      $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
      
      (new InsertFuncionario)->insert($dados);
      Helpers::redirecionar('funcionarios/');
    }

    public function confirmacao(string $id): void 
    {
      (new UpdateConfirmacao)->update($id);
      Helpers::redirecionar('funcionario/'. $id);
    }

    public function servicoVer(string $id, string $idFuncionario): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $funcionario = (new SelectFuncionarios)->buscaFuncionario($idFuncionario);
      $orcamentos = (new SelectOrcamentos)->buscaOrcamento($id);

      echo $this->template->renderizar('servicoVer.html', [
        'orcamentos' => $orcamentos,
        'funcionario' => $funcionario,
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }
    public function gasto(string $id): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();


      $orcamentos = (new SelectOrcamentos)->buscaOrcamento($id);

      echo $this->template->renderizar('gastoVer.html', [
        'orcamentos' => $orcamentos,
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function deleteGasto(string $id): void 
    {
      (new DeleteGasto)->delete($id);

      Helpers::redirecionar('funcionarios/');
    }
    public function comprovantes(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      echo $this->template->renderizar('comprovantes.html', [
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function comprovanteCreate(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      echo $this->template->renderizar('comprovanteAdd.html', [
 
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function servicosProfile(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

            $servicos = (new SelectServicos)->buscaTudoServicos();
      
            echo $this->template->renderizar('servicosProfile.html', [
              'servicos' => $servicos,
       
              'recentes' => true,
              'orcamentosRecentes' => $orcamentosRecentes,
              'recibosRecentes' => $recibosRecentes
            ]);
    }

    public function tarefaCriar(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

            $orcamentos = (new SelectOrcamentos)->buscaPendencia();
            $funcionarios = (new SelectFuncionarios)->busca();

            echo $this->template->renderizar('tarefaCriar.html', [
              'orcamentos' => $orcamentos,
              'funcionarios' => $funcionarios,
       
              'recentes' => true,
              'orcamentosRecentes' => $orcamentosRecentes,
              'recibosRecentes' => $recibosRecentes
            ]);
    }
    
    public function createTarefa(): void 
    {
      $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

      (new InsertTarefa)->insert($dados);

      Helpers::redirecionar('servicos/funcionarios');
    }

    public function deletarTarefa(string $id): void 
    {
      (new DeleteTarefa)->deletar($id);
      Helpers::redirecionar('servicos/funcionarios');
    }

    public function buscarTarefa(): void 
    {
      $busca = filter_input(INPUT_POST,'busca', FILTER_DEFAULT);
        
      $buscs = (new BuscaTarefa)->buscar($busca);

    //   foreach($buscs as $busc){
    //           echo "
    //           <div class='col'>
    //       <div class='card shadow-sm'>
    //         <div class='card-body'>
    //           <p class='card-text' id='serviceTxt'>".
    //         $busc->servico ."-". $busc->detalhe
    //       ."</p> 
    //       <div class='d-flex justify-content-between align-items-center'>
    //         <div class='btn-group'>
    //             <a href='{{ url('servico/'". $busc->id_orcamento ."'-'". $busc->id_funcionario."' class='btn btn-sm btn-outline-secondary'>Ver</a>
    //             <button data-bs-toggle='modal' data-bs-target='#exampleModal". $busc->id ."' class='btn btn-sm btn-outline-danger'>Deletar</button>
    //         </div>              {{ contarTempo(servico.data) }}
    //         <small class='text-muted'>". Helpers:: ."</small>
    //       </div>
    //     </div>
    //   </div>
    // </div>
    //           ";
      // }
    }


    public function selectProfile(): void 
    {
      $funcionarios = (new SelectFuncionarios)->busca();

      foreach($funcionarios as $busc){

        $span = (Helpers::confirmacao($busc->id) ? "<span class='position-absolute top-5 start-100 translate-middle p-2 bg-danger border border-light rounded-circle'>
        <span class='visually-hidden'>New alerts</span>
      </span>" : "");
        
        echo "
        <tr>
          <td>
            
            <a href='". Helpers::url('confirmacao/'. $busc->id) ."' class=' position-relative'>
              👁 ". $span ."
            </a>

          </td>
          <td>
            <a href='". Helpers::url('editar/'. $busc->id) ."'>
                🖊
            </a>
          </td>
          <td>". $busc->primeiro_nome ."</td>
          <td>". $busc->idade ."</td>
          <td>". $busc->telefone ."</td>
          <td>". $busc->email ."</td>
          <td>". $busc->endereco ."</td>
        </tr>
    ";
}
    }

    public function deletarProfile(string $id): void 
    {
      (new UpdateStateProfile)->update($id);
      Helpers::redirecionar('funcionarios/');
    }

    public function estoque(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $materiais = (new SelectMateriaisEstoque)->busca();
      $funcionarios = (new SelectFuncionarios)->busca();

      echo $this->template->renderizar('estoque.html', [
        'materiais' => $materiais,
        'funcionarios' => $funcionarios,

        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }
    public function novoMaterialEstoque(): void 
    {
            //Documentos Recentes para o navbar
            $orcamentosRecentes = (new SelectDocumentos)->busca();
            $recibosRecentes = (new SelectDocumentos)->buscaRecibo();
      
            echo $this->template->renderizar('novoMaterialEstoque.html', [
              'recentes' => true,
              'orcamentosRecentes' => $orcamentosRecentes,
              'recibosRecentes' => $recibosRecentes
            ]);
    }

    public function cadastrarMaterial(): void 
    {
      $nome =  filter_input(INPUT_POST,'nome', FILTER_DEFAULT);
      $loja =         filter_input(INPUT_POST,'loja', FILTER_DEFAULT);
      $valorMaterial =     filter_input(INPUT_POST,'valorMaterial', FILTER_DEFAULT);

      (new InsertEstoque)->insert($nome, $loja, $valorMaterial);

      Helpers::redirecionar('estoque/');
    }

    public function services(): void 
    {
      $id_funcionario = $_POST['id_funcionario'];
      $services = (new SelectServicos)->buscaPendencia($id_funcionario);
      echo json_encode($services);
    }

    public function tirarMaterial(): void 
    {
      $id_service =  filter_input(INPUT_POST,'service', FILTER_DEFAULT);
      $nome_material =  filter_input(INPUT_POST,'nome_material', FILTER_DEFAULT);
      $gasto =  filter_input(INPUT_POST,'gasto', FILTER_DEFAULT);
      $id_material = filter_input(INPUT_POST,'material', FILTER_DEFAULT);

      (new InsertGasto)->insert($id_service, $nome_material, $gasto);
      (new DeletarMaterialEstoque)->delete($id_material);

      Helpers::redirecionar('estoque/');
    }

    public function investimentos(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $investimentos = (new SelectInvestimento)->busca();

      echo $this->template->renderizar('investimento.html', [
        'investimentos' => $investimentos,
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function investimentoAdd(): void 
    {
       //Documentos Recentes para o navbar
       $orcamentosRecentes = (new SelectDocumentos)->busca();
       $recibosRecentes = (new SelectDocumentos)->buscaRecibo();
 
       echo $this->template->renderizar('investimentoAdd.html', [
         'recentes' => true,
         'orcamentosRecentes' => $orcamentosRecentes,
         'recibosRecentes' => $recibosRecentes
       ]);
    }
    
    public function investimentoCriar(): void 
    {
      $nome = filter_input(INPUT_GET,'nome', FILTER_DEFAULT);
      $fornecedor = filter_input(INPUT_GET,'fornecedor', FILTER_DEFAULT);
      $valor = filter_input(INPUT_GET,'valor', FILTER_DEFAULT);

      (new InsertInvestimento)->insert($nome, $fornecedor, $valor);
      Helpers::redirecionar('investimentos/');
    }

    public function lucroPlanilha(): void
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $funcionarios = (new SelectFuncionarios)->busca();
      $gastosFixos = (new SelectGastosFixos)->busca();

      echo $this->template->renderizar('lucroPlanilha.html', [
        'funcionarios' => $funcionarios,
        'gastosFixos' => $gastosFixos,
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }
    
    public function consultarLucro(): void
    {
      $mes = $_POST['mes'];

      $lucroLs = (new SelectLucrosMes)->select($mes);
      
      echo(json_encode($lucroLs));
    }
    
    public function gastoFixoAdd(): void
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      echo $this->template->renderizar('gastoFixoAdd.html', [
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function cadastroGastoFixo(): void 
    {
      $nome = filter_input(INPUT_GET,'nome', FILTER_DEFAULT);
      $valor = filter_input(INPUT_GET,'valor', FILTER_DEFAULT);

      (new InsertGastoFixo)->insert($nome, $valor);
      Helpers::redirecionar('lucro/planilha');
    }

    public function gastoFixoEditar(): void 
    {
      //Documentos Recentes para o navbar
      $orcamentosRecentes = (new SelectDocumentos)->busca();
      $recibosRecentes = (new SelectDocumentos)->buscaRecibo();

      $gastosFixos = (new SelectGastosFixos)->busca();

      echo $this->template->renderizar('gastoFixoAditar.html', [
        'gastosFixos' => $gastosFixos,
        'recentes' => true,
        'orcamentosRecentes' => $orcamentosRecentes,
        'recibosRecentes' => $recibosRecentes
      ]);
    }

    public function gastoFixoDeletar(string $id): void 
    {
      (new DeleteGastoFixo)->delete($id);
      Helpers::redirecionar('lucro/planilha');
    }

    public function batePonto(): void 
    {
      $date = $_POST['date'];
      $entrada = $_POST['entrada'];
      $saida = $_POST['saida'];
      $id_funcionario = $_POST['id_funcionario'];
      $valor = $_POST['valor'];

      $dados = [
        'date' => $date,
        'entrada' => $entrada,
        'saida' => $saida,
        'id_funcionario' => $id_funcionario,
        'valor' => $valor
      ];

      (new InsertBatePonto)->insert($dados);
    }

    public function deleteBatePonto(string $id, string $idFuncionario): void 
    {
      (new DeleteBatePonto)->delete($id);
      Helpers::redirecionar('funcionario/'. $idFuncionario);
    }

    public function cunsultaPagamento(): void 
    {
      $id_funcionario = $_POST['id_funcionario'];
      $opcaoPagamento = $_POST['opcaoPagamento'];

      $diaPagamento = (new SelectBatePonto)->buscaServico($id_funcionario, $opcaoPagamento);

      echo($diaPagamento);
    }

    public function pagarPendencia(): void 
    {
      $id = filter_input(INPUT_GET,'id_funcionario', FILTER_DEFAULT);
      $data = filter_input(INPUT_GET,'data', FILTER_DEFAULT);

      (new UpdateBatePonto)->update($id, $data);
      Helpers::redirecionar('funcionario/'. $id);
    }

    public function datePesquisa(): void 
    {
      $date = $_POST['date'];
      $id_funcionario = $_POST['id_funcionario'];

      $dados = (new SelectBatePonto)->buscaData($id_funcionario, $date);

      foreach($dados as $dado){
        $condicao = '';
        if($dado->states != 0){
          $condicao = "<span style='color: green;'>Pagamento comprovado</span>";
        }else{
          $condicao = "<span style='color: rgb(207, 201, 23);'>Pagamento pendente..</span>";
        }

        echo "
        <div class='d-grid gap-2'>
                      <button class='btn btn-outline-primary' type='button' data-bs-toggle='collapse' data-bs-target='#collapseExample". $dado->id ."' aria-expanded='false' aria-controls='collapseExample'>
                        ". $dado->data_trabalho ."
                      </button>
                    </div>
                    <div class='collapse' id='collapseExample". $dado->id ."'>
                      <div class='card card-body'>
                        <p>
                          Turno: <span style='color: rgb(12, 155, 12);'>". $dado->entrada ."</span> - <span style='color: rgb(14, 151, 14);'>". $dado->saida ."</span>
                        
                        <span style='padding-left: 7rem;'>Valor: <span style='color: rgb(14, 151, 14);'>R$ ". $dado->valor ."</span></span>
                        
                        </p>
                        <p>
                          <span style='padding-right: 10rem;'>
                            ". $condicao ."
                          </span>
    
                          <a href=". Helpers::url('deletar/batePonto/'. $dado->id .'-'. $dado->id_funcionario) ." class='hrefStyle'>deletar</a>
                        </p>
                        
                      </div>
                    </div>
                    <br>
        ";

      }
    }
}


?>