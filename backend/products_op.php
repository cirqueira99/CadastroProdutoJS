<?php include "./conexao.php"; ?>

<?php 
    $op = $_GET["op"];
    $id = $_GET["id"];
    
    if($op == 1){
        if( isset( $_POST["productName"] ) ){
            $nome = $_POST["productName"];
            $fornecedor = $_POST["selFornecedor"];            
            $qt = 0;
            $preco_custo = floatval($_POST["input_preco_custo"]);
            $preco_venda = floatval($_POST["input_preco_venda"]);
            

            $operacao_register = "INSERT INTO produtos 
            (nome, fornecedor, qt, preco_custo, preco_venda) 
            VALUES 
            ('$nome', '$fornecedor', $qt, $preco_custo, $preco_venda) ";

            if ($conn->query($operacao_register) === TRUE) {
                header("location: ../products.php");
                exit();
            } else {
                echo "Error: " . $operacao_register . "<br>" . $conn->error;
            }
            $conn->close();
            
    /*              
            echo ("Inicio");
            $lote = [];            
            print_r( $lote );
            echo ("Serializado");
            $seria = serialize($lote);
            print_r( $seria );
            echo ("UN-Serializado");
            $LOTE = unserialize($seria);
            print_r( $LOTE );
            echo ("adicionando valores e vendo resultado");
            $v1 = array(123, 5);
            array_push($LOTE, $v1);
            print_r( $LOTE );
            */
        }
    }else
    if($op == 2){
        if( isset( $_POST["productName"] ) ){
            $nome = $_POST["productName"];
            $fornecedor = $_POST["selFornecedor"];
            $preco_custo = intval($_POST["input_preco_custo"]);
            $preco_venda = intval($_POST["input_preco_venda"]);

            $operacao_update = "UPDATE produtos SET
            nome='$nome', fornecedor='$fornecedor', preco_custo='$preco_custo', 
            preco_venda='$preco_venda'
            WHERE id='$id'";

            if ($conn->query($operacao_update) === TRUE) {
                header("location: ../products.php");
                exit();
            } else {
                echo "Error: " . $operacao_update . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }

  ?>