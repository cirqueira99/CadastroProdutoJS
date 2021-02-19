<?php 
    include "../backend/conexao.php"; 
    
    $id = $_GET["id"];
    $operacao_consult =  "SELECT* FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conn, $operacao_consult); 
    $prod = mysqli_fetch_assoc($resultado)    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Provider Ditribuidora Beira-Rio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link href="../css/style.min.css" rel="stylesheet">
    <link type="text/css" href="../fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
    <script defer src="../fontawesome-free-5.9.0-web/js/all.js"></script>
</head>
<body>
    <div class="container-login100" style="background-image: url('../images/bg-03.jpg'); justify-content: flex-start; ">

      <?php include "./menu_uni.php" ?>

      <section class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30" style="width: 80%;" >
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Produto</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Alterar Dados do Produto</a>
            </li>                
            <li class="nav-item" role="presentation">
              <a class="nav-link btn-danger ms-3" id="pills-profile-tab" data-bs-toggle="pill" href="../backend/providier_op.php?op=2" role="tab" aria-controls="pills-profile" aria-selected="false">Excluir Produto</a>
            </li>                
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
          <!-- Mostrar Dados Produto-->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="group mt-5 col-10 bg-light">
                <div class="col-2"><img src="../images/prod.jpg" style="width: 100px"></div>
                <div class="d-flex col-9">
                    <div class="col-md-4">
                        <div class="form-group col-md-6">
                            <label class="text-secondary" >Código</label>
                            <h5 class="mt-2"><?php echo $prod["id"]; ?></h5>
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <label class="text-secondary">Preço de Custo</label>
                            <h5 class="mt-2"><?php echo( "R$ ".$prod["preco_custo"].",00" ); ?></h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group col-md-6">
                            <label class="text-secondary" >Nome</label>
                            <h5 class="mt-2"><?php echo $prod["nome"] ?></h5>
                        </div>
                        <div class="form-group col-md-6 mt-4">
                            <label class="text-secondary">Preço de Venda</label>
                            <h5 class="mt-2"><?php echo( "R$ ".$prod["preco_venda"].",00" ); ?></h5>
                        </div>
                    </div>
                    <div class="col-md-6">                    
                        <div class="form-group col-md-11">
                            <label class="text-secondary">Fornecedor</label>
                            <h5 class="mt-2"><?php echo $prod["fornecedor"]; ?></h5>
                        </div>                        
                        <div class="form-group col-md-6 mt-4">
                            <label class="text-secondary">Estoque</label>
                            <h5 class="mt-2"><?php echo $prod["qt"]; ?></h5>
                        </div> 
                    </div>  
                </div>                
            </div>
            
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">CÓD</th>
                  <th scope="col">NOME</th>
                  <th scope="col">FORNECEDOR</th>
                  <th scope="col">PREÇO CUSTO</th>
                  <th scope="col">PREÇO VENDA</th>
                  <th scope="col">ESTOQUE</th>
                  <th scope="col" class="view">VIEW</th>
                </tr>
              </thead>
              <tbody>    
                <?php
                 $operacao_consult =  "SELECT* FROM produtos";
                 $resultado = mysqli_query($conn, $operacao_consult); 
                 while($linha = mysqli_fetch_assoc($resultado)) { ?>    
                <tr>
                    <th scope="row"><?php echo $linha["id"] ?></th>  
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["fornecedor"] ?></td>
                    <td><?php echo ( "R$ ".$linha["preco_custo"].",00" ); ?></td>
                    <td><?php echo ( "R$ ".$linha["preco_venda"].",00" ); ?></td>
                    <td><?php echo $linha["qt"]; ?></td>
                    <td><a href="./pages_uni/providier_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                </tr>
                <?php } ?>            
              </tbody>
            </table>
            
          </div>
          <!-- Alterar Dados do Produtos-->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <form action="../backend/products_op.php?op=2&id=<?php echo $id?>" method="post">
              <div class="form-group col-md-4">
                <label class="text-secondary">Nome do Produto</label>
                <input type="text" class="form-control" id="productName" name="productName">
              </div>
              <div class="group">
                <div class="form-group col-md-4">
                  <label class="text-secondary">Fornecedor</label>
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
                  <label class="text-secondary">Preço de Custo</label>
                  <input type="number" class="form-control" id="input_preco_custo" name="input_preco_custo" placeholder="00,00">
                </div>
                <div class="form-group col-md-2">
                  <label class="text-secondary">Preço de Venda</label>
                  <input type="number"  class="form-control" id="input_preco_venda" name="input_preco_venda" placeholder="00,00">
                </div>
                
              </div> 

              <button type="submit" class="btn btn-primary mt-5">Atualizar</button>
            </form>
            
          </div>              
        </div>
      </section>
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>