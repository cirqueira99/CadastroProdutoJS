google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Mês', 'Vendas', 'Compras'],
    ['Janeiro',  1000,      400],
    ['Fevereiro',  1170,      460],
    ['Março',  660,       1120],
    ['Maio',  1030,      540],
    ['Abril',  2030,      840],
    ['Junho',  3030,      640],
    ['Julho',  1030,      540]
  ]);

  var options = {
    title: 'Compras e vendas mensais',
    curveType: 'function',
    'height': 500,
    'width': 890,
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('graficoLinhas'));

  chart.draw(data, options);
}