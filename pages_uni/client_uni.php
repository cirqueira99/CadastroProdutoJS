<?php 
    include "../backend/conexao.php"; 
    
    $id = $_GET["id"];
    $operacao_consult =  "SELECT* FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conn, $operacao_consult); 
    $cli = mysqli_fetch_assoc($resultado);    
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
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Cliente</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Alterar Dados do Cliente</a>
            </li>                
            <li class="nav-item" role="presentation">
              <a class="nav-link btn-danger ms-3" id="pills-profile-tab" data-bs-toggle="pill" href="../backend/providier_op.php?op=2" role="tab" aria-controls="pills-profile" aria-selected="false">Excluir Cliente</a>
            </li>                
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
          <!-- Mostrar Dados Cliente -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="group mt-5 col-10 bg-light">
              <div class="col-2"><img src="../images/user.png" style="width: 100px"></div>
              <div class=" d-flex col-10">
                <div class="col-3"> 
                  <div class="form-group">
                      <label class="text-secondary">Código</label>
                      <h5 class="mt-2">3</h5>
                  </div>
                  <div class="form-group mt-4">
                      <label class="text-secondary">Telefone</label>
                      <h5 class="mt-2">(17) 98855588</h5>
                  </div>                 
              </div>
              <div class="col-4">                    
                  <div class="form-group">
                    <label class="text-secondary">Nome do Cliente</label>
                    <h5 class="mt-2">Maria Torlean Oliveira Almeida</h5>
                  </div>
                  <div class="form-group mt-4">
                      <label class="text-secondary">E-mail</label>
                      <h5 class="mt-2">maria_oliveira@yahoo.com</h5>
                  </div>
              </div>    
              <div class="col-5">
                  <div class="form-group">
                    <label class="text-secondary">CNPJ/CPF</label>
                    <h5 class="mt-2">33865268000145</h5>
                  </div>
                  <div class="form-group mt-4">
                      <label class="text-secondary">Endereço</label>
                      <h5 class="mt-2">Rua Vergílio Macedo, 100    Cariacica Espírito Santo (ES)</h5>
                  </div> 
                  </div>  
              </div>               
            </div>
            
            <table class="table mt-5">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">COD</th>
                  <th scope="col">NOME</th>
                  <th scope="col">CNPJ/CPF</th>
                  <th scope="col">E-MAIL</th>
                  <th scope="col">CONTATO</th>
                  <th scope="col" class="view">VIEW</th>
                </tr>
              </thead>
              <tbody>    
                <?php
                 $operacao_consult =  "SELECT* FROM clientes";
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
          <!-- Alterar Dados do Cliente-->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="../backend/client_op.php?op=2&id=<?php echo $id?>" method="post">
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="companyName" class="text-secondary">Nome do Cliente</label>
                  <input type="text" class="form-control" id="clientName" name="clientName" value="<?php echo $cli["nome"] ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="cnpj" class="text-secondary">CNPJ/CPF</label>
                  <input type="text"  class="form-control" id="cnpj_cpf" name="cnpj_cpf" value="<?php echo $cli["cnpj_cpf"] ?>">
                </div>
              </div>    
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="inputAddress" class="text-secondary">Endereço</label>
                  <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="examplo: Rua dos José Franco, nº 0">
                </div> 
                <div class="form-group col-md-4">
                  <label for="inputCity" class="text-secondary">Cidade</label>
                  <input type="text" class="form-control" id="inputCity" name="inputCity">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState" class="text-secondary">Estado</label>
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
                    <label for="inputCity" class="text-secondary">Telefone</label>
                    <input type="text" class="form-control" id="inputPhone" name="inputPhone" value="<?php echo $cli["contato"] ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputCity" class="text-secondary">E-mail</label>
                    <input type="text" class="form-control" id=inputEmail" name="inputEmail" value="<?php echo $cli["email"] ?>">
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