
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vendas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="css/style.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
  <div class="container-login100" style="background-image: url('images/bg-03.jpg'); justify-content: flex-start; ">
        
    <?php include "./menu.php" ?>
    
    <section class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30" style="width: 80%;" >
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-history m-r-4"></i>Histórico de Vendas</a>
          </li>               
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="far fa-plus-square m-r-4"></i>Registrar Nova Venda</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt m-r-4"></i>Relatório de Vendas</a>
          </li>
        </ul>
      
        <div class="tab-content ms-2" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h3 class="h6 mt-4">Pesquisar Vendas:</h3> 
            <div class="group mt-4">
              <div class="col-md-3"><input type="text" class="form-control" id="produto" placeholder="Data Inicial: dd/mm/aaaa"></div>
              <div class="col-md-3"><input type="text" class="form-control" id="produto" placeholder="Data Final: dd/mm/aaaa"></div>
              <div><button class="btn btn-primary">Pesquisar</button></div>
              <div><button class="btn btn-primary ms-4">Mostrar Todas as Vendas</button></div>
            </div>  

            <table class="table">
              <thead class="thead-tr">
                <tr>
                  <th scope="col">DATA</th>
                  <th scope="col">COMPRA</th>
                  <th scope="col">VENDEDOR</th>
                  <th scope="col">CLIENTE</th>
                  <th scope="col">PRODUTOS(lote)</th>
                  <th scope="col">QT</th>
                  <th scope="col">FRETE</th>
                  <th scope="col">VALOR TOTAL</th>
                  <th scope="col">PRAZO DE ENTREGA</th>
                  <th scope="col">OBS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>12/04/21</td>
                  <th scope="row">1</th>
                  <td>José</td>
                  <td>Mark</td>
                  <td>
                    <p class="h6">Batata(1234)</p>
                    <p class="h6">Tomate(1234)</p>
                    <p class="h6">Batata Doce(1234)</p>
                  </td>
                  <td>
                    <p class="h6">5</p>
                    <p class="h6">2</p>
                    <p class="h6">3</p>
                  </td>
                  <td>R$25,00</td>
                  <td>12/04/21</td>
                  <td>R$ 105,00</td>
                  <td>ND</td>
                </tr>
                <tr>
                  <td>12/04/21</td>
                  <th scope="row">2</th>
                  <td>José</td>
                  <td>Brenda</td>
                  <td>
                    <p class="h6">Batata(1234)</p>
                    <p class="h6">Tomate(1234)</p>
                  </td>
                  <td>
                    <p class="h6">5</p>
                    <p class="h6">2</p>
                  </td>
                  <td>R$25,00</td>
                  <td>R$ 105,00</td>
                  <td>12/04/21</td>
                  <td>ND</td>
                </tr>
                <tr>
                  <td>12/04/21</td>
                  <th scope="row">3</th>
                  <td>José</td>
                  <td>Patrick</td>
                  <td>
                    <p class="h6">Batata(1234)</p>
                    <p class="h6">Tomate(1234)</p>
                    <p class="h6">Batata Doce(1234)</p>
                  </td>
                  <td>
                    <p class="h6">5</p>
                    <p class="h6">2</p>
                    <p class="h6">3</p>
                  </td>
                  <td>R$25,00</td>
                  <td>R$ 105,00</td>
                  <td>12/04/21</td>
                  <td>ND</td>
                </tr>
                <tr>
                  <td>12/04/21</td>
                  <th scope="row">4</th>
                  <td>José</td>
                  <td>Mark</td>
                  <td>
                    <p class="h6">Tomate(1234)</p>
                  </td>
                  <td>
                    <p class="h6">5</p>
                  </td>
                  <td>R$25,00</td>
                  <td>R$ 105,00</td>
                  <td>12/04/21</td>                  
                  <td>ND</td>
                </tr>
                <tr>
                  <td>12/04/21</td>
                  <th scope="row">5</th>
                  <td>José</td>
                  <td>Patrick</td>
                  <td>
                    <p class="h6">Batata(1234)</p>
                    <p class="h6">Tomate(1234)</p>
                    <p class="h6">Batata Doce(1234)</p>
                  </td>
                  <td>
                    <p class="h6">5</p>
                    <p class="h6">2</p>
                    <p class="h6">3</p>
                  </td>
                  <td>R$25,00</td>
                  <td>R$ 105,00</td>
                  <td>12/04/21</td>
                  <td>ND</td>
              </tbody>
            </table>
          </div>
          
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form>
              <!-- Adicionar produtos -->
              <div class="group mt-5">
                <div>
                  <select id="selectProduto" class="form-control" style="width:200px;">
                    <option value="0" selected="">Escolha um Produto</option>
                    <option>Batata</option>
                    <option>Tomate</option>
                    <option>Batata Doce</option>
                    <option>Alface</option>
                    <option>Couve</option>
                    <option>Berinjela</option>
                  </select>                  
                </div>                   
                <div><input type="number" id="produto" placeholder="Quantidade" style="width:100px;" class="form-control ms-5"></div>
                <div><button class="btn btn-primary ms-5">Adicionar</button></div>
              </div>

              <div class="group mt-5">
                <div class="col-6">
                  <!-- Tabela de escolha de produtos -->
                  <table class="table col-5">
                    <thead class="thead-tr">
                      <tr>
                        <th scope="col" >Produtos</th>
                        <th scope="col" >N° Lote</th>
                        <th scope="col" >Qt</th>                    
                        <th scope="col" >R$ Uni</th>
                        <th scope="col" >Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Batata</td>
                        <td>1234</td>
                        <td>5</td>
                        <td>20,00</td>
                        <td>100,00</td>
                      </tr>
                      
                    </tbody>
                  </table>   

                  <div class="group mt-5 justify-content-around">
                    <h4>Valor Total</h4>
                    <h3 class="ms-4 text-success">R$ 00,00</h3>
                  </div>
                </div>
                <!-- Inserção de Dados -->
                <div class="col-6 ms-5">
                    <div class="col-12">
                      <div class="group">
                        <div class="col-5">
                          <label for="label_codV">Vendedor</label>
                          <!-- Preenche automaticamente conforme usuário q está em login -->
                          <input type="text" class="form-control" id="inp_codV" name="inp_codV" placeholder="José">
                        </div>  
                        <div class="col-5 ms-2">
                          <label for="label_codC">Cliente</label>
                          <select id="selectProduto" class="form-control" style="width:200px;">
                            <option>Mark</option>
                            <option>Fernanda</option>                           
                          </select>    
                        </div>                     
                      </div>

                      <div class="group"> 
                        <div class="col-5">
                          <label for="vFrete">Valor do Frete</label>
                          <input type="text" class="form-control" id="vFrete" name="vFrete" placeholder="00,00">
                        </div>                                    
                        <div class="col-5 ms-2">
                          <label for="data">Prazo de Entrega</label>
                          <input type="date" class="form-control" id="data">
                        </div>                        
                      </div>
                    </div>
                  
                  <div style="width:88%">
                    <label for="obs">Observação</label>
                    <input type="text" class="form-control" id="obs" placeholder="...">
                  </div> 
                </div>

              </div>
              <div class="col-12 mt-5 text-sm-center"><button type="submit" class="btn btn-primary">Registrar</button></div>
            </form>
          </div>
          <!-- Relatório dos Compras-->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <form >
                <div class="row">
                  <div class="col-5 ms-2">
                  <label for="vendedor">Vendedor(s)</label>
                  <select class="form-select group m-b-15 " aria-label="Default select example">
                    <option value="1">Todos os Vendedore</option>
                    <option value="2">Vendedor 1</option>
                    <option value="3">Vendedor 2</option>
                    <option value="3">Vendedor 3</option>
                  </select>
                  </div>
                  <div class="col-5 ms-2"> 
                  <label for="fornecedor">Cliente(s)</label>
                  <select class="form-select group m-b-15 " aria-label="Default select example">
                    <option value="1">Todos os Clientes</option>
                    <option value="2">Cliente 1</option>
                    <option value="3">Cliente 2</option>
                    <option value="3">Cliente 3</option>
                  </select>
                  </div>
                
                  <div class="col-5 ms-2">
                    <label for="produtos">Produto(s)</label>
                      <select class="form-select group m-b-15" aria-label="Default select example">
                      <option value="1">Todos Produtos</option>
                      <option value="2">Cebola</option>
                      <option value="3">Berinjela</option>
                      <option value="3">Batata</option>
                    </select>
                  </div>
                </div>  
                <div class="group">
                  <div class="col-5 ms-2">
                    <label for="data">Desde</label>
                    <input type="date" class="form-control" id="data">
                  </div>
                  <div class="col-5 ms-2">
                    <label for="data">Até</label>
                    <input type="date" class="form-control" id="data">
                  </div>
                </div>
                <div class="form-check form-switch m-b-10 m-t-10">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Valor do Frete</label>
                </div>
                <div class="form-check form-switch m-b-10">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault">Valor Total</label>
                </div>


    
                <button type="submit" class="btn btn-primary mt-5">Gerar</button>
            </form>  
          </div>
        </div>
    </section>
    
  </div>

	<div id="dropDownSelect1"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script>
   
  </script>

</body>
</html>