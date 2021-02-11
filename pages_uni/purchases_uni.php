<?php 
    include "../backend/conexao.php"; 
    
    $id = $_GET["id"];
    // busacando compra no db
    $operacao_consult =  "SELECT* FROM compras WHERE id = $id";
    $resultado1 = mysqli_query($conn, $operacao_consult); 
    $compra = mysqli_fetch_assoc($resultado1);
    
    // buscando nome funcionário
    $compra_cod_func = $compra["cod_vendedor"];    
    $operacao_consult =  "SELECT* FROM funcionarios WHERE id = $compra_cod_func";
    $resultado2 = mysqli_query($conn, $operacao_consult); 
    $func = mysqli_fetch_assoc($resultado2);
    
    
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
        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
            <!--<li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados da Compra</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link btn-danger ms-3" id="pills-profile-tab" data-bs-toggle="pill" href="../backend/providier_op.php?op=2" role="tab" aria-controls="pills-profile" aria-selected="false">Excluir Compra</a>
            </li>
             -->                
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
          <!-- Mostrar Dados da Compra-->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="col-12 d-flex align-items-end">
                <h3 class="text-secondary ms-3" >Compra: #</h3>
                <h2 class="mt-2 ms-2" id="id_compra" style="color:#007bff;"><?php echo $compra["id"]; ?></h2>
              </div>
            <div class="group justify-content-around">
              <div class="col-5 mt-5">
                <!-- Func e Forn -->
                <div class="col-12 d-flex flex-column justify-content-center">
                  <div class="col-md-12 d-flex align-items-end">
                      <h6 class="text-secondary" >Funcionário:</h6>
                      <h6 class="ms-3"><?php echo (" ".$func["nome"]); ?></h6>
                  </div>
                  <div class="col-md-12 d-flex align-items-end">
                      <h6 class="text-secondary">Fornecedor:</h6>
                      <h6 class="ms-3"><?php echo (" ".$compra["nome_fornecedor"]); ?></h6>
                  </div>
                </div>
                <!-- Resumo Compra -->
                <div class="col-11 mt-3 p-3" style="background-color: #ececec;">
                  <div class="group justify-content-between"><h6>Total</h6><h6><?php echo money_format('%.2n', $compra["valor_total"]); ?></h6></div>
                  <div class="group justify-content-between" ><h6>Frete</h6><h6 class="text-warning"><?php echo ("+".money_format('%.2n', $compra["valor_frete"])); ?></h6></div>
                  <div class="group justify-content-between"><h6>Forma Pagamento</h6><h6><?php echo $compra["forma_pagamento"]; ?></h6></div>
                  <div class="group justify-content-between"><h6>Parcelas</h6><h6><?php echo $compra["parcelas"]; ?></h6></div>
                  <div class="group justify-content-between border-top align-items-center" style ="color:green;height:50px">
                    <h5>Valor Compra</h5><h5><?php echo money_format('%.2n', $compra["valor_total"]); ?></h5>
                  </div>
                </div>
                <!-- Obvervação -->
                <div class="col-11 mt-3">
                  <div class="col-md-12 text-secondary">
                    <h6>Observação:</h6>
                    <?php 
                      if( $compra["observacao"]=="" ){ echo "<textarea id='obs' name='obs' placeholder='...' class='border form-control'></textarea> "; }
                      else{ echo "<textarea id='obs' name='obs' class='border form-control'>".$compra["observacao"]."</textarea> "; }
                    ?>
                  </div>
                </div>
              </div>
              <!-- Datas -->
              <div class="col-6 mt-5">
                <div class="d-flex">
                  <div class="col-5 d-flex align-items-end">
                    <h6 class="text-secondary" >Data Compra: </h6>
                    <h5 class="mt-2 ms-3"><?php echo ( date("d/m/Y", strtotime($compra["data_op"])) );  ?></h5>
                  </div>
                  <div class="col-6 ms-3 d-flex align-items-end">
                    <h6 class="text-secondary" >Data Entrega: </h6>
                    <div class="col-md-7" id="div_dt2">
                      <?php 
                        if( $compra["data_entrega"]=="" ){ echo "<input type='date' class='col-5 form-control text-secondary ms-2' id='date2'>"; }
                        else{ echo "<h5 class='mt-2 ms-3'>"; echo date("d/m/Y", strtotime($compra["data_op"]))."</h5>"; }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- Tabela de escolha de produtos -->
                <div class="col-11 mt-4">
                  <table class="table">
                    <thead>
                        <tr class="theadtr">
                            <th scope="col">Produtos</th>
                            <th scope="col">Qt</th>                    
                            <th scope="col">R$ Uni</th> 
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <?php 
                    $u_cod_prod = unserialize($compra["cod_produtos"]); // transforma serializados em array novamente
                    $u_qt_prod = unserialize($compra["qt_produtos"]);
                    $qt = 0;
                    for( $i=0; $i<count($u_cod_prod); $i++){
                      $cod_prod = $u_cod_prod[$i]; // pega o id do produto
                      $operacao_consult_produtos =  "SELECT* FROM produtos WHERE id = $cod_prod"; // busca nome do produto
                      $resultado_p = mysqli_query($conn, $operacao_consult_produtos);
                      $produto = mysqli_fetch_assoc($resultado_p);
                      $total1 = floatval( $produto["preco_custo"]*$u_qt_prod[$i] );
                      $v_uni = $total1/$u_qt_prod[$i];
                      echo "<tr>
                              <td>".$produto["nome"]."</td>
                              <td>".$u_qt_prod[$i]."</td>
                              <td>".$v_uni."</td>
                              <td>".money_format('%.2n', $total1)."</td>
                            </tr>";
                    }?>                      
                  </table> 
                </div>
              </div>
            </div>

            <!-- Botões -->
            <div class="group col-12 mt-5 justify-content-around">
              <div class="col-md-2">
                <button type="submit" class="btn btn-danger" onclick="exluir_compa()">Excluir Compra</button>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary" onclick="alterar_dados_compra()">Salvar Alterações</button>
              </div>
              
            </div>
          </div>
      </section>
    
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="../purches_sales.js"></script>
</body>
</html>