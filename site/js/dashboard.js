(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
    let ctx2
    if(document.getElementById('myChart2') !== null){
      ctx2 = document.getElementById('myChart2')
      const myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
          labels: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'
          ],
          datasets: [{
            data: [
            Janeiro,
            Fevereiro,
            Março,
            Abril,
            Maio,
            Junho,
            Julho,
            Agosto,
            Setembro,
            Outubro,
            Novembro,
            Dezembro
            ],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 3,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false
          }
        }
      })
    }

})()