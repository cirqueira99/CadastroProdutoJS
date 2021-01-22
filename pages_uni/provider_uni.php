<?php 
    include "../backend/conexao.php"; 
    
    $id = $_GET["id"];
    $operacao_consult =  "SELECT* FROM fornecedores WHERE id = $id";
    $resultado = mysqli_query($conn, $operacao_consult); 
    $forn = mysqli_fetch_assoc($resultado);
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
    <div class="container-login100" style="background-image: url('../images/bg-03.jpg'); justify-content: flex-start; ">

      <?php include "./menu_uni.php" ?>

      <section class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30" style="width: 80%;" >
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Fornecedor</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Alterar Dados do Fornecedor</a>
            </li>                
            <li class="nav-item" role="presentation">
              <a class="nav-link btn-danger" id="pills-profile-tab" data-bs-toggle="pill" href="../backend/providier_op.php?op=2" role="tab" aria-controls="pills-profile" aria-selected="false">Excluir Produto</a>
            </li>                
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
          <!-- Mostrar Dados FOrnecedor -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="group mt-5 col-10 bg-light">
              <div class="col-2"><img src="../images/user.png" style="width: 100px"></div>
              <div class=" d-flex col-9">
                <div class="col-md-3"> 
                  <div class="form-group col-md-4">
                      <label class="text-secondary">Código</label>
                      <h5 class="mt-2"><?php echo $forn["id"] ?></h5>
                  </div>
                  <div class="form-group col-md-4 mt-4">
                      <label class="text-secondary">Telefone</label>
                      <h5 class="mt-2"><?php echo $forn["contato"] ?></h5>
                  </div>                 
              </div>
              <div class="col-md-5">                    
                  <div class="form-group">
                    <label class="text-secondary">Nome da Empresa</label>
                    <h5 class="mt-2"><?php echo $forn["nome"] ?></h5>
                  </div>
                  <div class="form-group mt-4">
                      <label class="text-secondary">E-mail</label>
                      <h5 class="mt-2"><?php echo $forn["email"] ?></h5>
                  </div>
              </div>    
              <div class="col-md-5">
                  <div class="form-group">
                    <label class="text-secondary">CNPJ/CPF</label>
                    <h5 class="mt-2"><?php echo $forn["cnpj_cpf"] ?></h5>
                  </div>
                  <div class="form-group mt-4">
                      <label class="text-secondary">Endereço</label>
                      <h5 class="mt-2"><?php echo $forn["endereco"] ?></h5>
                  </div> 
                  </div>  
              </div>               
            </div>
            
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOME</th>
                  <th scope="col">CNPJ/CPF</th>
                  <th scope="col">E-MAIL</th>
                  <th scope="col">CONTATO</th>
                  <th scope="col" class="view">VIEW</th>
                </tr>
              </thead>
              <tbody>    
                <?php
                 $operacao_consult =  "SELECT* FROM fornecedores";
                 $resultado = mysqli_query($conn, $operacao_consult); 
                 while($linha = mysqli_fetch_assoc($resultado)) { ?>    
                <tr>
                    <th scope="row"><?php echo $linha["id"] ?></th>  
                    <td><?php echo $linha["nome"] ?></td>
                    <td><?php echo $linha["cnpj_cpf"] ?></td>
                    <td><?php echo $linha["email"] ?></td>
                    <td><?php echo $linha["contato"] ?></td>
                    <td><a href="./pages_uni/providier_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                </tr>
                <?php } ?>            
              </tbody>
            </table>
            
          </div>
          <!-- Alterar Dados do Fornecedor-->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="../backend/provider_op.php?op=2&id=<?php echo $id?>" method="post">
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="companyName">Nome da Empresa</label>
                  <input type="text" class="form-control" id="providierName" name="providierName" value="<?php echo $forn["nome"]?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="cnpj">CNPJ/CPF</label>
                  <input type="text"  class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Somente números" value="<?php echo $forn["nome"]?>">
                </div>
              </div>    
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="inputAddress">Endereço</label>
                  <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="examplo: Rua dos José Franco, nº 0">
                </div> 
                <div class="form-group col-md-4">
                  <label for="inputCity">Cidade</label>
                  <input type="text" class="form-control" id="inputCity" name="inputCity">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Estado</label>
                  <select class="form-control" id="inputState" name="inputState" >
                    <option selected>Escolher...</option>
                    <?php 
                    $estados = ["Acre (AC)", "Alagoas (AL)", "Amazonas (AM)", "Bahia (BA)", "Ceará (CE)", "Distrito Federal (DF)", "Espírito Santo (ES)", "Goiás (GO)",
                      "Maranhão (MA)", "Mato Grosso (MT)", "Mato Grosso do Sul (MS)", "Pará (PA)", "Paraíba (PB)", "Paraná (PR)", "Pernambuco (PE)", "Piauí (PI)", "Rio de Janeiro (RJ)",
                      "Rio Grande do Norte (RN)", "Rio Grande do Sul (RS)", "Rondônia (RO)", "Roraima (RR)", "Santa Catarina (SC)", "São Paulo (SP)", "Sergipe (SE)", "Tocantins (TO)"];
                    for($i=0; $i<count($estados); $i++){
                    ?>
                    <option><?php echo $estados[$i]; ?></option>
                   <?php }?>
                  </select>
                </div>  
              </div>
              <div class="group">                    
                  <div class="form-group col-md-4">
                    <label for="inputCity">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $forn["contato"]?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputCity">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $forn["email"]?>">
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