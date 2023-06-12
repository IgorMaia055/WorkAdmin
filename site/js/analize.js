
    let lucros = '';
    let materiais = '';
  '{% for lucro in lucros %}'
    lucros += '-' + '{{ lucro.lucro }}'.replace(".", "").replace(",", ".")
    materiais += '-' + '{{ lucro.valorMaterial }}'.replace(".", "").replace(",", ".")
  '{% endfor %}'

    let arrLucros = lucros.split('-')
    let totalLucros = 0;
    for(let i = 0; i < arrLucros.length; i ++){
      totalLucros += Number(arrLucros[i])

    }
    document.querySelector('#Tgeral').innerHTML = totalLucros.toLocaleString('pt-br', {minimumFractionDigits: 2})

    let arrMateriais = materiais.split('-')
    let totalMaterial = 0;
    for(let i = 0; i < arrMateriais.length; i ++){
      totalMaterial += Number(arrMateriais[i])

    }
    document.querySelector('#Tmaterial').innerHTML = totalMaterial.toLocaleString('pt-br', {minimumFractionDigits: 2})

    let orcamentosStr = '{{ orcamentos }}'.replace(".", "").replace(",", ".")
    let totalGeralNum = Number(orcamentosStr)


    let totalCustoAa
function totalMEI(totalAa){
  totalCustoAa = totalAa

  let custoMEI = 86400

  let totalCustoMEI = custoMEI / totalAa
  document.getElementById('valorMEI').innerHTML = totalCustoMEI.toFixed(2).replace(".", ",") + '%'
}

  let a_2023 = {
    'reforma': null,
    'estetica': null,
    'restauracao': null,
    'ajustes': null,
    'p_inteiro': null,
    'p_razoavel': null
  }

  let a_2024 = {
    'reforma': null,
    'estetica': null,
    'restauracao': null,
    'ajustes': null,
    'p_inteiro': null,
    'p_razoavel': null
  }

'{% for lucro in lucros %}'
  if('{{ lucro.tipo }}' == 1){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }else if('{{ lucro.tipo }}' == 2){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }else if('{{ lucro.tipo }}' == 3){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }else if('{{ lucro.tipo }}' == 4){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }else if('{{ lucro.tipo }}' == 5){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }else if('{{ lucro.tipo }}' == 6){
    dataLucro('{{ lucro.tipo }}', Number('{{ lucro.lucro }}'.replace(".", "").replace(",", ".")))
  }

  function dataLucro(tipo, lucro){
    if(tipo == 1 && '{{ lucro.ano }}' == 2023){
      a_2023.reforma += lucro
    }else if(tipo == 2 && '{{ lucro.ano }}' == 2023){
      a_2023.estetica += lucro
    }else if(tipo == 3 && '{{ lucro.ano }}' == 2023){
      a_2023.restauracao += lucro
    }else if(tipo == 4 && '{{ lucro.ano }}' == 2023){
      a_2023.ajustes += lucro
    }else if(tipo == 5 && '{{ lucro.ano }}' == 2023){
      a_2023.p_inteiro += lucro
    }else if(tipo == 6 && '{{ lucro.ano }}' == 2023){
      a_2023.p_razoavel += lucro
    }else if(tipo == 1 && '{{ lucro.ano }}' == 2024){
      a_2024.reforma += lucro
    }else if(tipo == 2 && '{{ lucro.ano }}' == 2024){
      a_2024.estetica += lucro
    }else if(tipo == 3 && '{{ lucro.ano }}' == 2024){
      a_2024.restauracao += lucro
    }else if(tipo == 4 && '{{ lucro.ano }}' == 2024){
      a_2024.ajustes += lucro
    }else if(tipo == 5 && '{{ lucro.ano }}' == 2024){
      a_2024.p_inteiro += lucro
    }else if(tipo == 6 && '{{ lucro.ano }}' == 2024){
      a_2024.p_razoavel += lucro
    }
  }

    
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
      
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['Ano', 'Procedimento Inteiro', 'Procedimento Razoável', 'Estética', 'Reforma', 'Restauração', 'Ajustes'],
              ['2023', calcularPorcentagem(a_2023.p_inteiro) , calcularPorcentagem(a_2023.p_razoavel), calcularPorcentagem(a_2023.estetica), calcularPorcentagem(a_2023.reforma), calcularPorcentagem(a_2023.restauracao), calcularPorcentagem(a_2023.ajustes)],
              ['2024', calcularPorcentagem(a_2024.p_inteiro), calcularPorcentagem(a_2024.p_razoavel), calcularPorcentagem(a_2024.estetica), calcularPorcentagem(a_2024.reforma), calcularPorcentagem(a_2024.restauracao), calcularPorcentagem(a_2024.ajustes)]
              ]
              );

              function calcularPorcentagem(num){
                if(num == null){
                  return null
                }else{
                  let formatNum = (num * 100 / totalCustoAa)
                  return formatNum
                }
              }
      
              var options = {
                chart: {
                  title: 'Desempenho da empresa %',
                  subtitle: 'Análize de envolvimento em porcentagem dos serviços : 2023-2024',
                },
                bars: 'horizontal', // Required for Material Bar Charts.
                style: 'percent'
              };
      
              var chart = new google.charts.Bar(document.getElementById('barchart_material'));
      
              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
            
'{% endfor %}'

    //procedimento razóavel
    let totalArr1 = []
    let totalArr2 = []
    '{% for p_razoavel in total_p_razoavel %}'
    totalArr1.push('{{ p_razoavel.total }}')
    totalArr2.push('{{ p_razoavel.total }}')
    '{% endfor %}'
    //procedimento inteiro
    let totalArr_p_inteiro1 = []
    let totalArr_p_inteiro2 = []
    //ajustes
    let total_ajustes1 = []
    let total_ajustes2 = []
    //restauração
    let total_restauracao1 = []
    let total_restauracao2 = []
    //estética
    let total_estetica1 = []
    let total_estetica2 = []
    //reforma
    let total_reforma1 = []
    let total_reforma2 = []

  
      google.charts.load('current', {'packages':['corechart']})
      google.charts.setOnLoadCallback(drawChart6);

    $('#serviceSelect').on('change', () => {
      let val = $('#serviceSelect').val()
      google.charts.load('current', {'packages':['corechart']})

      if(val == '1'){
        '{% for reforma in total_reforma %}'
        total_reforma1.push('{{ reforma.total }}')
        total_reforma2.push('{{ reforma.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart1);
      }else if(val == '2'){
        '{% for estetica in total_estetica %}'
        total_estetica1.push('{{ estetica.total }}')
        total_estetica2.push('{{ estetica.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart2);
      }else if(val == '3'){
        '{% for restauracao in total_restauracao %}'
        total_restauracao1.push('{{ restauracao.total }}')
        total_restauracao2.push('{{ restauracao.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart3);
      }else if(val == '4'){
        '{% for total_ajuste in total_ajustes %}'
        total_ajustes1.push('{{ total_ajuste.total }}')
        total_ajustes2.push('{{ total_ajuste.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart4);
      }else if(val == '5'){
        '{% for p_inteiro in total_p_inteiro %}'
        totalArr_p_inteiro1.push('{{ p_inteiro.total }}')
        totalArr_p_inteiro2.push('{{ p_inteiro.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart5);
      }else if(val == '6'){
        '{% for p_razoavel in total_p_razoavel %}'
        totalArr1.push('{{ p_razoavel.total }}')
        totalArr2.push('{{ p_razoavel.total }}')
        '{% endfor %}'

        google.charts.setOnLoadCallback(drawChart6);
      }
    })
    
    function drawChart1() {
      let arrFinal_return = arrFinal(total_reforma1, total_reforma2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço reforma',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

    totalArr_p_inteiro1 = []
    totalArr_p_inteiro2 = []

    cicloDeVida(arrFinal_return, 3000, 4000, 6100)

    }

    function drawChart2() {
      let arrFinal_return = arrFinal(total_estetica1, total_estetica2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço estética',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

    total_estetica1 = []
    total_estetica2 = []

    cicloDeVida(arrFinal_return, 300, 400, 510)

    }

    function drawChart3() {
      let arrFinal_return = arrFinal(total_restauracao1, total_restauracao2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço restauração',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

    total_restauracao1 = []
    total_restauracao2 = []

    cicloDeVida(arrFinal_return, 10000, 20000, 51000)

    }

    function drawChart4() {
      let arrFinal_return = arrFinal(total_ajustes1, total_ajustes2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço ajuste',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

    total_ajustes1 = []
    total_ajustes2 = []

    cicloDeVida(arrFinal_return, 30, 50, 150)
    }

    function drawChart5() {
      let arrFinal_return = arrFinal(totalArr_p_inteiro1, totalArr_p_inteiro2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço procedimento inteiro',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

      totalArr_p_inteiro1 = []
      totalArr_p_inteiro2 = []

      cicloDeVida(arrFinal_return, 4000, 5000, 6100)
    }

    function drawChart6() {

      let arrFinal_return = arrFinal(totalArr1, totalArr2)

      var data = google.visualization.arrayToDataTable(arrFinal_return);

      var options = {
        title: 'Elasticidade do serviço procedimento razoável',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);

      totalArr1 = []
      totalArr2 = []

      cicloDeVida(arrFinal_return, 1000, 2000, 3100)
    }

    function cicloDeVida(arrFinal_return, val1, val2, val3){
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(clicloDeVida2);

      function clicloDeVida2() {
        let total = 0;
        let totalQuantidade = 0
        for(let i = 1; i < arrFinal_return.length; i++){
          total += arrFinal_return[i][1]
          totalQuantidade += Number(arrFinal_return[i][0])
        }
        let ticketMedio = total / totalQuantidade
       
          var data = google.visualization.arrayToDataTable([
            ['Cliclo', '(R$)'],
            ['Introdução',  val1],    
            ['Crescimento',  val2],   
            ['Maturidade', val3],     
            ['Declínio',  val2],      
            ['Retrocedência',  val1], 
          ]);
            
          var options = {
            title: 'Cliclo de vida do serviço (ticket médio: ' + ticketMedio + ')',
            curveType: 'function',
            legend: { position: 'bottom' },
            tooltip: {
              isHtml: true,
              trigger: "selected"
            },
            crosshair: { trigger: 'focus' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chartClicloDeVida'));
  
          chart.draw(data, options);
        }
        
    }

          
    function arrFinal(totalArr1, totalArr2){
        let totalArrTipos = []
        
        function element(valor){
          let n = 0
          let element
          for(let i = 0; i <= totalArr1.length; i++){
            let index = totalArr1.indexOf(valor)
            if (index != -1) {
              n ++
              element = totalArr1[index].replace(".", "").replace(",", ".")
    
              totalArr1.splice(index, 1);
            }
          }
          if(element != undefined){
            totalArrTipos.push([String(n), Number(element)])
          }
        }
        for(let i = 0; i < totalArr2.length; i++){
          element(totalArr2[i])
        }
  
  
        let arrFinal = [
          ['Quantidade', 'R$'],
        ]
  
        for(let i = 0; i < totalArrTipos.length; i++){
            arrFinal.push(totalArrTipos[i])
        }
        
        console.log(arrFinal)
        return arrFinal
      }