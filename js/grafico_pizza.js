google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(desenharPizza);

function desenharPizza(){
  tabela = new google.visualization.DataTable();
  tabela.addColumn('string','categorias');
  tabela.addColumn('number','valores');
  tabela.addRows([

      ['Batata',2000],
      ['Tomate',500],
      ['Couve',230],
      ['Alface',50],
      ['Batata Doce',900],
      ['Berinjela',260]
  ]);
  var opcoes = {
                'title':'Produtos vendido:',
                'height': 400,
                'width': 600,
                is3D: true
            };

  var grafico = new google.visualization.PieChart(document.getElementById('pizza'));
      grafico.draw(tabela, opcoes);
}


