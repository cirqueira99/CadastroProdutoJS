<?php include "./backend/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Produtos </title>
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
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-clipboard-list m-r-4"></i>Lista de Produtos</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-plus-square m-r-4"></i>Cadastrar Novo Produto</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="far fa-file-alt m-r-4"></i>Relatório de Produtos</a>
            </li>
        </ul>
        
        <div class="tab-content ms-2" id="pills-tabContent">
          <!-- Mostrar Lista-->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="group mt-4"> 
              <div class="col-md-4"><input type="text" class="form-control" id="inputcliente" placeholder="Digite o nome do produto"></div>
              <div><button class="btn btn-primary">Pesquisar</button></div>
              <div><button class="btn btn-primary ms-4">Mostra Todos</button></div>
            </div>                 
            <table class="table mt-4">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">COD</th>
                  <th scope="col">NOME</th>                    
                  <th scope="col">FORNECEDOR</th>
                  <th scope="col">VALOR CUSTO(cx)</th>
                  <th scope="col">VALOR VENDA(cx)</th>
                  <th scope="col">ESTOQUE</th>
                  <th scope="col">VIEW</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php
                  $operacao_consult =  "SELECT* FROM produtos";
                  $resultado = mysqli_query($conn, $operacao_consult); 
                  while($linha = mysqli_fetch_assoc($resultado)) { ?>
                  <th scope="row"><?php echo $linha["id"] ?></th>  
                  <td><?php echo $linha["nome"] ?></td>
                  <td><?php echo $linha["fornecedor"] ?></td>
                  <td><?php echo ("R$ ".$linha["preco_custo"]) ?></td>
                  <td><?php echo ("R$ ".$linha["preco_venda"]) ?></td>
                  <td><?php echo $linha["qt"] ?></td>
                  <td><a href="./pages_uni/products_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                </tr>     
                <?php } ?>                 
              </tbody>
            </table>
          </div>         
        
          <!-- Cadastrar Novo Produto -->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="./backend/products_op.php?op=1" method="post">
              <div class="form-group col-md-4">
                <label>Nome do Produto</label>
                <input type="text" class="form-control" id="productName" name="productName">
              </div>
              <div class="group">
                <div class="form-group col-md-4">
                  <label>Fornecedor</label>
                  <select class="form-control" id="selFornecedor" name="selFornecedor" >
                    <option selected>Escolher...</option>
                    <?php 
                    $operacao_consult =  "SELECT* FROM fornecedores";
                    $resultado = mysqli_query($conn, $operacao_consult); 
                    while($linha = mysqli_fetch_assoc($resultado)) { ?>
                    <option><?php echo $linha["nome"]; ?></option>
                    <?php }?>
                  </select>
                </div> 
                <div class="form-group col-md-2">
                  <label>Preço de Custo</label>
                  <input type="number" class="form-control" id="input_preco_custo" name="input_preco_custo" placeholder="00,00">
                </div>
                <div class="form-group col-md-2">
                  <label>Preço de Venda</label>
                  <input type="number"  class="form-control" id="input_preco_venda" name="input_preco_venda" placeholder="00,00">
                </div>
                
              </div> 

              <button type="submit" class="btn btn-primary mt-5">Enviar</button>
            </form>
          </div>
          <!-- Relatório de Produto -->
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form>
              <select class="form-select group m-b-15" aria-label="Default select example">
                <option value="1">Todos</option>
                <option value="2">Cebola</option>
                <option value="3">Berinjela</option>
                <option value="3">Batata</option>
              </select>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Fornecedor</label>
              </div>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Preço de Custo</label>
              </div>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Preço de Venda</label>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Estoque</label>
              </div>
             
              <button type="submit" class="btn btn-primary mt-5" data-bs-dismiss="alert">Gerar</button>
            </form>       
          </div>
        </div>
      </section>
    
	  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>