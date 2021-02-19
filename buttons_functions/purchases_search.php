<?php
    include "../backend/conexao.php"; 

    $data1 = $_REQUEST["data1"];
    $data2 = $_REQUEST["data2"];
    $but = $_REQUEST["b"];
    
    if( ($data1=="") and ($data2!="") ){
        echo "<script> alert('Coloque uma data Inicio!')</script>";
        exit();
    }else
    if( $but=="Exibir Todas as Compras" ){
        $operacao_consult_compras_data =  "SELECT* FROM compras ORDER BY data_op DESC";
    }else
    if( ($data1!="") and ($data2=="") ){
        $operacao_consult_compras_data =  "SELECT* FROM compras WHERE data_op = '$data1'";
    }else
    if( ($data1!="") and ($data2!="") )
        $operacao_consult_compras_data =  "SELECT* FROM compras WHERE data_op >= '$data1' and data_op <= '$data2'";
    
    if ($conn->query($operacao_consult_compras_data) == TRUE) {
        $resultado = mysqli_query($conn, $operacao_consult_compras_data);
        while($linha = mysqli_fetch_assoc($resultado)) {
            $cod_func = $linha["cod_vendedor"];
            $operacao_consult_func =  "SELECT* FROM funcionarios WHERE id = $cod_func";
            $resultado_f = mysqli_query($conn, $operacao_consult_func);
            $func = mysqli_fetch_assoc($resultado_f);
            $data_op = date( "d/m/Y", strtotime($linha["data_op"]) );
            if($linha["data_entrega"] ==""){$data_entrega="";}else{$data_entrega = date( "d/m/Y", strtotime($linha["data_entrega"]) );}
            
            $dinheiro = money_format('%.2n', $linha["valor_total"]);
            echo "<tr>
                    <td>".$data_op."</td>".
                    "<th scope='row'>".$linha['id']."</th>".
                    "<td>".$func["nome"]."</td>".
                    "<td>".$linha["nome_fornecedor"]."</td>".
                    "<td>".$dinheiro."</td>".
                    "<td>".$data_entrega."</td>".
                    "<td><a href='./pages_uni/purchases_uni.php?id=".$linha['id']."'><i class='fas fa-eye'></i></a></td>".
                "</tr>";
        }
    }else{
        echo "Error: " . $operacao_consult_compras_data . "<br>" . $conn->error;
    } 
    
?>