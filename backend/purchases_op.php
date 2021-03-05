<?php 
    include "./conexao.php"; 
    session_start();

    $op = $_GET["op"];    
    
    if($op == 1){
        if( isset( $_POST["inp_codV"] ) ){
            $today = date("Y/m/d");
            $cod_vendedor = $_POST["inp_codV"];
            $fornecedor = $_POST["selFornecedor"];            
            $frete = $_POST["vFrete"];
            $parcelas = $_POST["parcelas"];
            $f_pagamento = $_POST["forma_pg"];
            $obs = $_POST["obs"];

            $cod_prods = array();
            $qt_prods = array();
            $valor_total = 0;
        
            foreach ($_SESSION["lista"] as $item) {
                array_push($cod_prods, $item["cod"]);
                array_push($qt_prods, $item["qt"]);
                $valor_total += $item["total"];
            }
            
            $seria_cod = serialize($cod_prods);
        
            $seria_qt = serialize($qt_prods);      
        
            $operacao_register = "INSERT INTO compras 
            (data_op, cod_vendedor, nome_fornecedor, cod_produtos, qt_produtos, valor_frete, valor_total, forma_pagamento, parcelas, observacao) 
            VALUES 
            ('$today', '$cod_vendedor', '$fornecedor', '$seria_cod', '$seria_qt', $frete, $valor_total, '$f_pagamento', $parcelas, '$obs') ";

            if ($conn->query($operacao_register) != TRUE) 
            echo "Error: " . $operacao_register . "<br>" . $conn->error;
        
            $conn->close();  
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "DistribuidoraRio";
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            for( $i=0; $i<count($cod_prods); $i++ ){            
                $operacao_consult =  "SELECT* FROM produtos WHERE id = $cod_prods[$i] ";
                $resultado = mysqli_query($conn, $operacao_consult);
                $produto= mysqli_fetch_assoc($resultado);
            
                $quantidade = $qt_prods[$i] + $produto["qt"];          
                
                $operacao_update = "UPDATE produtos SET
                    qt = $quantidade
                    WHERE id = $cod_prods[$i]";
                    
                if ($conn->query($operacao_update) != TRUE) 
                    echo "Error: " . $operacao_update . "<br>" . $conn->error;;
            
            }
            unset($_SESSION["lista"]);
            header("location: ../purchases.php"); 
            $conn->close();  
        }
    }
    if($op == 2){
        $id = $_GET["id"];
        $data = $_POST["data2"];
        $obs = $_POST["obs"];

        if($data == ""){
            $operacao_update = "UPDATE compras SET data_entrega='$data', observacao='$obs' WHERE id = '$id'";
        }else{
            $operacao_update = "UPDATE compras SET observacao='$obs' WHERE id = '$id'";
        }

        if ($conn->query($operacao_update) === TRUE) {
            header("location: ../pages_uni/purchases_uni.php?id=".$id);
            exit();
        } else {
            echo "Error: " . $operacao_update . "<br>" . $conn->error;
        }
        $conn->close();        
    }
   
?>

