<?php include "./backend/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Employee Ditribuidora Beira-Rio</title>
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
      
      <section class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-30" style="width: 80%;">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-clipboard-list m-r-4"></i>Lista de Funcionários</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="far fa-calendar-plus m-r-4"></i>Registro de Ponto</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-user-plus m-r-4"></i>Cadastrar novo Funcionário</a>
          </li>
        </ul>

        <div class="tab-content mt-4" id="pills-tabContent">
          <!-- Registro de ponto -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table" id="pg1">
              <thead class="thead-dark">
                <tr class="theadtr">
                  <th scope="col">COD</th>
                  <th scope="col">NOME</th>
                  <th scope="col">CARGO</th>
                  <th scope="col">CPF</th>
                  <th scope="col">CONTATO</th> 
                  <th scope="col" class="view">VIEW</th>                     
                </tr>
              </thead>
              <tbody>    
                  <?php
                  $operacao_consult =  "SELECT* FROM funcionarios";
                  $resultado = mysqli_query($conn, $operacao_consult); 
                  while($linha = mysqli_fetch_assoc($resultado)) { ?>    
                  <tr>
                      <th scope="row"><?php echo $linha["id"] ?></th>  
                      <td><?php echo $linha["nome"] ?></td>
                      <td><?php echo $linha["cargo"] ?></td>
                      <td><?php echo $linha["cpf"] ?></td>
                      <td><?php echo $linha["contato"] ?></td>
                      <td><a href="./pages_uni/employee_uni.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-eye"></i></a></td>
                  </tr>
                  <?php } ?>            
                </tbody>
            </table>
          </div>    
          <!-- Lista de Funionários -->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <h3 class="h6">Registrar Hora</h3>
            <div class="group"> 
              <div class="col-4">
                <select class="form-control" id="selFornecedor" name="selFornecedor" >
                  <option selected>Selecione um Funcionário</option>
                  <?php 
                  $operacao_consult =  "SELECT* FROM funcionarios";
                  $resultado = mysqli_query($conn, $operacao_consult); 
                  while($linha = mysqli_fetch_assoc($resultado)) { ?>
                  <option><?php echo $linha["nome"]; ?></option>
                  <?php }?>
                </select>
              </div>
              <div><button class="btn btn-primary">Registrar Entrada</button></div>
              <div><button class="btn btn-danger ms-3">Registrar Saída</button></div>
            </div>   
            <h3 class="h6 mt-4">Pesquisar Registros</h3> 
            <div class="group">
              <div class="col-3"><input type="text" class="form-control" id="produto" placeholder="Código do funcionário"></div>
              <div class="col-3"><input type="date" class="form-control" id="produto" placeholder="Data Inicial: dd/mm/aaaa"></div>
              <div class="col-3"><input type="date" class="form-control" id="produto" placeholder="Data Final: dd/mm/aaaa"></div>
              <div><button class="btn btn-primary">Pesquisar</button></div>
              <div><button class="btn btn-primary ms-3">Mostra Todos</button></div>
            </div>  

            <table class="table mt-5" id="pg1">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Cod</th>
                  <th scope="col">Nome do Funcionário</th>
                  <th scope="col">Entrada</th>
                  <th scope="col">Saida</th>
                  <th scope="col">Horas Trabalhadas</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <th>José Roberto</th>
                  <td>07:00 h</td>
                  <td>17:00 h</td>
                  <td>00:00 h</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <th>Paulo Lima</th>
                  <td>06:00 h</td>
                  <td>17:00 h</td>
                  <td>+01:00 h</td>
                </tr>                
              </tbody>
            </table>            
          </div>
          <!-- Cadastrar Novo Funcionário -->
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form action="./backend/employee_op.php?op=1" method="post">
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="companyName">Nome do Funcionário</label>
                  <input type="text" class="form-control" id="employeeName" name="employeeName">
                </div>
                <div class="form-group col-md-3">
                  <label for="cnpj">CPF</label>
                  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Somente números">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">Telefone</label>
                    <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Somente números">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">E-mail</label>
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="exemplo@d.com">
                  </div>
              </div>    
              <div class="group">
                <div class="form-group col-md-4">
                  <label for="inputAddress">Endereço</label>
                  <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Rua dos Bobos, nº 0">
                </div> 
                <div class="form-group col-md-3">
                  <label for="inputCity">Cidade</label>
                  <input type="text" class="form-control" id="inputCity" name="inputCity">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEstado">Estado</label>
                  <select class="form-control" id="inputState" name="inputState">
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
                    <label for="inputCity">Carteira de Trabalho</label>
                    <input type="text" class="form-control" id="carteira" name="carteira" placeholder="Somente números">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Salário</label>
                    <input type="text" class="form-control" id="salario" name="salario" placeholder="Somente números: 00,00">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                  </div>
              </div>
              <div class="group">
                  <div class="form-group col-md-4">
                    <label for="inputCity">Banco</label>
                    <input type="text" class="form-control" id="banco" name="banco" placeholder="exemplo: Banco do Brasil">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Agência</label>
                    <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Somente Números">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Conta</label>
                    <input type="text" class="form-control" id="conta" name="conta" placeholder="Somente Números">
                  </div>
                </div>
                <div class="group">    
                  <div class="form-group col-md-4">
                    <label for="inputCity">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="exemplo: Joé33, Mari@">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Senha</label>
                    <input type="text" class="form-control" id="senha" name="senha" placeholder="**********">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCity">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                      <option selected="">Escolha a categoria...</option>
                      <option>Administrador</option>
                      <option>Funcionário</option>
                    </select>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary mt-5">Enviar</button>
            </form>
          </div>
        </div>
      </section>
    </div>
    
	<div id="dropDownSelect1"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>