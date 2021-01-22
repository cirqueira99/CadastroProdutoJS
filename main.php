
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ditribuidora Beira-Rio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/icofont/icofont/icofont.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
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
    </script>
</head>
<body>
  <div class="container-login100" style="background-image: url('images/bg-03.jpg'); justify-content: flex-start;">
    
    <?php include "./menu.php" ?>
  
    <section class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" style="width: 78%;">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Balanço Geral</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Balanço Mensal</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active group"   id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="group">
                <div id="pizza">
                  
                
                </div>

                <div>
                  <h1 id="vendas">Vendas</h1>
                    <p id="NumVendas">344</p>
                  <h1 id="compras">Compras</h1>
                    <p id="NumCompras">234</p>
                </div>
              </div>
            </div>


            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div id="graficoLinhas">
              </div> 
            </div>
            
          </div>
    </section>

  </div> 
    
    
	<div id="dropDownSelect1"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/grafico_linhas.js" ></script>
    <script type="text/javascript" src="js/grafico_pizza.js" ></script>
</body>
</html>