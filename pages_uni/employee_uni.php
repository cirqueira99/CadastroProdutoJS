<?php 
    include "../backend/conexao.php"; 
    
    $id = $_GET["id"];
    $operacao_consult =  "SELECT* FROM funcionarios WHERE id = $id";
    $resultado = mysqli_query($conn, $operacao_consult); 
    $func = mysqli_fetch_assoc($resultado);    
    $fcpf = $func["cpf"];

    $operacao_consult =  "SELECT* FROM usuarios WHERE cpf_usuario = $fcpf";
    $resultado = mysqli_query($conn, $operacao_consult); 
    $usuario = mysqli_fetch_assoc($resultado);
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
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados do Funcionário</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Alterar Dados do Funcionário</a>
            </li>                
            <li class="nav-item" role="presentation">
              <a class="nav-link btn-danger ms-2" id="pills-profile-tab" data-bs-toggle="pill" href="../backend/providier_op.php?op=2" role="tab" aria-controls="pills-profile" aria-selected="false">Excluir Funcionário</a>
            </li>                
        </ul>
        
        <div class="tab-content ms-3" id="pills-tabContent">
            <!-- Mostrar Dados Funcionário -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="group mt-5 col-10 bg-light">
                    <div class="col-2">
                        <img src="../images/user.png" style="width: 100px">
                        <div class="form-group col-md-4 mt-4">
                            <label class="text-secondary">Username</label>
                            <h5 class="mt2"><?php echo $usuario["user"] ?></h5>
                        </div> 
                    </div>
                    <div class="  col-10">
                        <div class="group">
                            <div class="form-group col-md-3">
                                <label class="text-secondary">Código</label>
                                <h5 class="mt-2">11</h5>
                            </div>
                            <div class="form-group col-md-5">
                                <label class="text-secondary">Nome</label>
                                <h5 class="mt-2">José Roberto Henrique Silva</h5>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-secondary">CPF</label>
                                <h5 class="mt-2">22233311140</h5>
                            </div>
                               
                        </div>
                        <div class="group">
                            <div class="form-group col-md-3">
                                <label class="text-secondary">Telefone</label>
                                <h5 class="mt-2">(19)12345678</h5>
                            </div> 
                            <div class="form-group col-md-5">
                                <label class="text-secondary">E-mail</label>
                                <h5 class="mt-2">jose@gmail.com</h5>
                            </div>                        
                            
                            <div class="form-group col-md-4">
                                <label class="text-secondary">Cargo</label>
                                <h5 class="mt-2">Atendente</h5>
                            </div>   
                        </div>          
                        <div class="group">
                            <div class="form-group col-md-10">
                                <label class="text-secondary">Endereço</label>
                                <h5 class="mt-2">Rua Almeida SIlva, 43  São Carlos São Paulo (SP)</h5>
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
                <form action="../backend/employee_op.php?op=2&id=<?php echo $id;?>" method="post">
                    <div class="group">
                        <div class="form-group col-md-4">
                            <label for="companyName" class="text-secondary">Nome do Funcionário</label>
                            <input type="text" class="form-control" id="employeeName" name="employeeName" value="<?php echo $func["nome"]?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cnpj" class="text-secondary">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $func["cpf"]?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="text-secondary">Telefone</label>
                            <input type="text" class="form-control" id="inputPhone" name="inputPhone" value="<?php echo $func["contato"]?>" required>
                        </div>
                        
                    </div>    
                    <div class="group">
                        <div class="form-group col-md-4">
                            <label for="inputAddress" class="text-secondary">Endereço</label>
                            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Rua dos Bobos, nº 0" required>
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="text-secondary">Cidade</label>
                            <input type="text" class="form-control" id="inputCity" name="inputCity" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEstado" class="text-secondary">Estado</label>
                            <select class="form-control" id="inputState" name="inputState" required>
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
                            <label for="inputCity" class="text-secondary">E-mail</label>
                            <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $func["email"]?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="text-secondary">Cargo</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $func["cargo"]?>" required>
                        </div>                        
                    </div>
                    <div class="group">
                        
                        </div>
                        <div class="group">    
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="text-secondary">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $usuario["user"]?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="text-secondary">Senha</label>
                            <input type="text" class="form-control" id="senha" name="senha" placeholder="**********" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="text-secondary">Categoria</label>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>