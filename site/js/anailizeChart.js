
$(document).ready(function (){
    $('#busca').keyup(function (){
        var busca = $(this).val();
        if(busca.length > 0){
  
            $.ajax({
                url: $('form').attr('data-url-busca'),
                method: 'POST',
                data: {
                    busca: busca   
                },
                success: function (data) {
                  var dataLimp = data.replace(/[']/g, '"')
                  $('#buscaResult').html(dataLimp)
                }
            })
        }
    })

  const url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.4390/dados?formato=json"
  fetch(url , {
      method: "GET",
      mode: "cors"
  }).then((response) => {
      if (!response.ok) throw new Error(response.error);
      
      return response.json()
      .then((dados) => {

        //chat 1
  google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var arr = [
        ['Data', 'Selic']
      ]

      for(let i = 400; i < dados.length; i++){
        arr.push([dados[i].data,  Number(dados[i].valor)])
      }
      
      var data = google.visualization.arrayToDataTable(
        arr
      );

      var options = {
        title: 'Taxa de juros - Selic acumulada no mês',
        hAxis: {title: '% a.m',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
         
      }).catch((err) => {
          console.log(err)
      });
  }).catch((err) => {
    console.log(err)

  })

  const url2 = 'https://api.bcb.gov.br/dados/serie/bcdata.sgs.27155/dados?formato=json'
    fetch(url2 , {
      method: "GET",
      mode: "cors"
  }).then((response) => {
      if (!response.ok) throw new Error(response.error);
      
      return response.json()
      .then((dados) => {

        //chat 1
  google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var arr = [
        ['Data', 'Juros do MEI']
      ]

      for(let i = 0; i < dados.length; i++){
        arr.push([dados[i].data,  Number(dados[i].valor)])
      }
      
      var data = google.visualization.arrayToDataTable(
        arr
      );

      var options = {
        title: 'Taxa de juros do MEI pessoa física por modalidade de crédito',
        hAxis: {title: '% a.a',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
    }

      }).catch((err) => {
          console.log(err)
      });
  }).catch((err) => {
    console.log(err)

  })

         
})



      
