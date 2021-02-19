<?php include "./backend/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Clientes Ditribuidora Beira-Rio </title>
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
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-address-card m-r-4"></i>Lista de Clientes</a>
            </li>               
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-user-plus m-r-4"></i>Cadastrar Novo Cliente</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-file-alt m-r-4"></i>Relatório de Clientes</a>
            </li>                
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <!-- Mostrar Lista de Clientes -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="group mt-4"> 
                <div class="col-md-4"><input type="text" class="form-control" id="inputcliente" placeholder="Digite o nome do cliente"></div>
                <div><button class="btn btn-primary">Pesquisar</button></div>
                <div><button class="btn btn-primary ms-4">Mostra Todos</button></div>
              </div>  
              <table class="table mt-4" id="pg1">
                <thead class="thead-dark">
                  <tr class="theadtr">
                    <th scope="col">COD</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CNPJ/CPF</th>
                    <th scope="col">EMAIL</th>
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
                      <td><a href="./pages_uni/client_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                  </tr>
                  <?php } ?>            
                </tbody>
              </table>    
            </div>
            <!-- Cadastrar Novo Cliente -->
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <form action="./backend/client_op.php?op=1" method="post">
                <div class="group">
                  <div class="form-group col-md-4">
                    <label for="companyName">Nome do Cliente</label>
                    <input type="text" class="form-control" id="clientName" name="clientName">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ/CPF</label>
                    <input type="text"  class="form-control" id="cnpj_cpf" name="cnpj_cpf" placeholder="Somente números">
                  </div>
                </div>    
                <div class="group">
                  <div class="form-group col-md-4">
                    <label for="inputAddress">Endereço</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Rua dos Bobos, nº 0">
                  </div> 
                  <div class="form-group col-md-4">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputEstado">Estado</label>
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
                      <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Somente números">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputCity">E-mail</label>
                      <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="exemplo@d.com">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Enviar</button>
              </form>
            </div>
            <!-- Relatório dos Clientes-->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form >
              <!-- Exibir  Todos os Clientes Registrados no Sistema-->
            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Cliente(s)</label>
            <select class="form-select group m-b-15" aria-label="Default select example">
                <option value="1">Todos os Clientes</option>
                <option value="2">Cliente 1</option>
                <option value="3">Cliente 2</option>
                <option value="3">Cliente 3</option>
              </select>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled">
                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Compras</label>
              </div>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Endereço</label>
              </div>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Telefone</label>
              </div>
              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">E-mail</label>
              </div>

              <div class="form-check form-switch m-b-10">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">CNPJ/CPF</label>
              </div>

              <button type="submit" class="btn btn-primary mt-5">Gerar</button>
            </form>                   
          </div>            

          </div>
      </section>
    </div>
           
	<div id="dropDownSelect1"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>