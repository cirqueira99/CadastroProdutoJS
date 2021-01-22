<?php include "./backend/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Provider Ditribuidora Beira-Rio</title>
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
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="far fa-list-alt m-r-4"></i>Lista de Fornecedores</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-user-plus m-r-4"></i>Cadastrar Novo Fornecedor</a>
            </li> 
            <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="far fa-file-alt m-r-4"></i>Relatório de Fornecedores</a>
          </li>               
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
          <!-- Mostrar Lista-->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table">
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
                    <td><a href="./pages_uni/provider_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                </tr>
                <?php } ?>            
              </tbody>
            </table>
          </div>
          <!-- Cadastrar Novo Fornecedor-->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="./backend/provider_op.php?op=1" method="post">
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="companyName">Nome da Empresa</label>
                  <input type="text" class="form-control" id="providierName" name="providierName">
                </div>
                <div class="form-group col-md-4">
                  <label for="cnpj">CNPJ/CPF</label>
                  <input type="text"  class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Somente números">
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
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Somente números">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputCity">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="exemplo@d.com">
                  </div>
              </div>

              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <form >
              <!-- Exibir  Todos os Fornecedores Registrados no Sistema-->
            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Fornecedor(s)</label>  
            <select class="form-select group m-b-15" aria-label="Default select example">
                <option value="1">Todos os Fornecedores</option>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>