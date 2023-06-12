function consulta(cnpj){

    let cpnjLimp = cnpj.replace('.', '').replace('-', '').replace('/', '')

var url = "https://publica.cnpj.ws/cnpj/"+ cpnjLimp;

fetch(url , {
    method: "GET",
    mode: "cors"
}).then((response) => {

        return response.json()
    
}).then((data) => {
    console.log(data)

    $('#resposta1').html(data.razao_social)
    var valorFormatado = Number(data.capital_social).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    $('#resposta2').html(valorFormatado)
    $('#resposta3').html(data.natureza_juridica.descricao)
    $('#resposta4').html(data.porte.descricao)
    $('#resposta5').html(data.simples.mei)
    $('#resposta6').html(data.simples.simples)
    $('#resposta7').html(data.qualificacao_do_responsavel.descricao)

    let socios = document.querySelector('#Socios')
    socios.innerHTML = ''
    for(let i = 0; i < data.socios.length; i++){
        var id = i + 1
        socios.innerHTML += '<tr>'+
              '<th scope="row">'+ id +'</th>'+
              '<td id="res1">'+ data.socios[i].nome +'</td>'+
              '<td id="res3">'+ data.socios[i].tipo +'</td>'+
              '<td id="res4">'+ data.socios[i].qualificacao_socio.descricao +'</td>'+
              '<td id="res5">'+ data.socios[i].faixa_etaria +'</td>'+
            '</tr>'
    }

})
.catch((err) => {
    console.log(err)
})

}
