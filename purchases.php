<?php 
  include "./backend/conexao.php"; 
  
  session_start();
  $_SESSION["lista"] = array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Compras</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="css/style.min.css" rel="stylesheet">
  <link type="text/css" href="./fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
  <script defer src="./fontawesome-free-5.9.0-web/js/all.js"></script>
</head>
<body>
  <div class="container-login100" style="background-image: url('images/bg-03.jpg'); justify-content: flex-start; ">
        
    <?php include "./menu.php" ?>
    
    <section class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30" style="width: 80%;" >
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-history m-r-4"></i>Histórico de Compras</a>
        </li>               
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-cart-plus m-r-4"></i>Registrar Nova Compra</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt m-r-4"></i>Relatório de Compras</a>
        </li>
      </ul>
    
      <div class="tab-content" id="pills-tabContent">
        <!-- Lista de Compras -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="group mt-5">
            <div><button class="btn btn-dark" onclick="mostrar_por_data(this);">Exibir Todas as Compras</button></div>
            <div class="d-flex align-items-end ms-5"><a href="#" onclick="mostrar_botoes_intervalo();">Por Intervalo de Data</a></div>
            <div class="col-md-2 ms-4" id="div_dt1"></div>
            <div class="col-md-2" id="div_dt2"></div>
            <div id="but_pesquisar"></div>
          </div>
          <table class="table mt-5">
            <thead class="thead-dark">
              <tr class="theadtr">
                <th scope="col">DATA VENDA</th>
                <th scope="col">COMPRA</th>
                <th scope="col">FUNCIONÁRIO</th>
                <th scope="col">FORNECEDOR</th>            
                <th scope="col">VALOR TOTAL</th>
                <th scope="col">DATA ENTREGA</th>
                <th scope="col" class="view">VIEW</th>                
              </tr>
            </thead>
            <tbody id="list_compras">       
            </tbody>
          </table>
        </div>
        <!-- Registrar Nova Compra -->
        <div class="tab-pane fade show " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <!-- Adicionar produtos -->
            <div class="group mt-5">
              <div>                  
                <select id="selectProduto" class="form-control" name="selectAddProd" style="width:200px;">
                  <option selected="">Escolha um Produto</option>   
                  <?php 
                  $operacao_consult_produtos =  "SELECT* FROM produtos";
                  $resultado = mysqli_query($conn, $operacao_consult_produtos); 
                  while($linha = mysqli_fetch_assoc($resultado)) { ?>
                  <option><?php echo $linha["nome"]; ?></option>
                  <?php } ?> 
                </select>                  
              </div>                   
              <div><input type="number" class="form-control ms-5" id="qt" name="qt" placeholder="Quantidade" style="width:100px;"></div>
              
              <div><button class="btn btn-primary ms-5" onclick="add_itens()">Adicionar</button></div>
            </div>

          <div class="group mt-5 justify-content-between">
            <div class="col-6" id="mostrar">
              <!-- Tabela de escolha de produtos -->
              <table class="table col-5" >
                <thead>
                  <tr class="theadtr">
                    <th scope="col">Cod</th>
                    <th scope="col">Produto</th>
                    <th scope="col">R$ Uni</th>
                    <th scope="col">Qt</th>                    
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody >
                  <tr style="background: #ececec">
                    <th scope="col">Totais</th>
                    <th scope="col"></th>
                    <th scope="col">
                    <th scope="col">0</th>       
                    <th scope="col" id="totalVProdutos">R$ 00,00</th>
                  </tr>                  
                </tbody>
              </table>   

              <div class="group mt-5 justify-content-around">
                <h4>Valor Total da compra</h4>
                <h3 class="ms-4" id="TotalCompra" style="color:#198754;">R$ 00,00</h3>
              </div>
            </div>
            <!-- Inserção de Dados -->
            <div class="col-5">
              <form action="./backend/purchases_op.php?op=1" method="post">
                <div class="d-flex col-12 bg-light justify-content-around">
                  <div class="col-5"> 
                    <div class="col-12">
                      <label for="label_codV">Código Vendedor</label>
                      <!-- Preenche automaticamente conforme usuário q está em login -->
                      <input type="text" class="form-control" id="inp_codV" name="inp_codV" required>
                    </div>
                    <div class="col-12 mt-3">
                      <label for="vFrete">Valor do Frete</label>
                      <input type="number" class="form-control" id="vFrete" name="vFrete" placeholder="00,00" onblur="atualiza_valores(this)">
                    </div> 
                    <div class="col-12 mt-3">
                      <label for="obs">Parcelas</label>
                      <input type="number" class="form-control" id="parcelas" name="parcelas" placeholder="..." required>
                    </div>
                  </div>
                  <div class="col-6 ms-3">
                    <div class="col-12">
                      <label for="label_codC">Fornecedor</label>
                      <select id="selFornecedor" name="selFornecedor" class="form-control" required>
                        <option selected="">Escolha um Produto</option>   
                        <?php 
                        $operacao_consult =  "SELECT* FROM fornecedores";
                        $resultado = mysqli_query($conn, $operacao_consult); 
                        while($linha = mysqli_fetch_assoc($resultado)) { ?>
                        <option><?php echo $linha["nome"]; ?></option>
                        <?php }
                        ?>                           
                      </select>    
                    </div>
                    <div class="col-12 mt-3">
                      <label for="forma_pg">Forma Pagamento</label>
                      <select class="form-control" id="forma_pg" name="forma_pg" required>
                        <option>Dinheiro Vista</option>
                        <option>Cartão Crédito</option>
                        <option>Cartão Débito</option>
                      </select>
                    </div> 
                    <div class="col-12 mt-3"> 
                      <label for="obs">Observação</label>
                      <input type="text" class="form-control" id="obs" name="obs" placeholder="...">
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-5 text-sm-center"><button type="submit" class="btn btn-primary">Finalizar Compra</button></div>
              </form>
            </div>
          </div> 
        </div>
        <!--Relatório de compras-->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <form >
              <div class="row">
                <div class="col-5 ms-2">
                <label for="vendedor">Vendedor</label>
                <select class="form-select group m-b-15 " aria-label="Default select example" >
                  <option value="1">Todos os Vendedores</option>
                  <option value="2">Vendedor 1</option>
                  <option value="3">Vendedor 2</option>
                  <option value="3">Vendedor 3</option>
                </select>
                </div>
                <div class="col-5 ms-2"> 
                <label for="fornecedor">Fornecedor</label>
                <select class="form-select group m-b-15 " aria-label="Default select example"  >
                  <option value="1">Todos os Fornecedores</option>
                  <option value="2">Fornecedor 1</option>
                  <option value="3">Fornecedor 2</option>
                  <option value="3">Fornecedor 3</option>
                </select>
                </div>
              
                <div class="col-5 ms-2">
                  <label for="produtos">Produto(s)</label>
                    <select class="form-select group m-b-15" aria-label="Default select example">
                    <option value="1">Todos</option>
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


  <script src="./purches_sales.js"></script>
</body>
</html>