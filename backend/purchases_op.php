<?php 
    include "./conexao.php"; 
    session_start();

    if( isset( $_POST["inp_codV"] ) ){
        $today = date("m/d/Y");
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
        ($today, '$cod_vendedor', '$fornecedor', '$seria_cod', '$seria_qt', $frete, $valor_total, '$f_pagamento', $parcelas, '$obs') ";

        if ($conn->query($operacao_register) === TRUE) {
            header("location: ../purchases.php");
            exit();
        } else {
            echo "Error: " . $operacao_register . "<br>" . $conn->error;
        }
        $conn->close();        
       
    }
?>

