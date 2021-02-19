<?php
    include "../backend/conexao.php"; 
    
    $id_compra = $_REQUEST["id"];
    $data1 = $_REQUEST["data1"];
    $data2 = $_REQUEST["data2"];
    $obs = $_REQUEST["obs"];
    echo "<h2>".$id_compra."</h2><h2>".$data1."</h2><h2>".$data2."</h2><h2>".$obs."</h2>";
   /*
   $operacao_update = "UPDATE compras SET
        data_entrega='$data2', observacao='$observacao'
        WHERE id = '$id_compra'";
    
    if ($conn->query($operacao_update) === TRUE) {
        echo "<div class='col-9 mt-4 d-flex align-items-end'>
                <h6 class='text-secondary' >Data Compra: </h6>
                <h5 class='mt-2 ms-3' id='data1'>".$data1."</h5>
            </div>
            <div class='col-9 mt-4 d-flex align-items-end'>
                <h6 class='text-secondary' >Data Entrega: </h6>
                <div class='col-md-7' id='div_dt2'>
                    <h5 id='data2' class='mt-2 ms-3'>".$data2."</h5>
                </div>
            </div>
            <div class='col-11 mt-5'>
                <div class='col-md-12 text-secondary'>
                    <h6>Observação:</h6>
                    <textarea id='obs' name='obs' class='col-12 border p-2'>".$obs."</textarea> 
                </div>
            </div>";
    } else {
        echo "Error: " . $operacao_update . "<br>" . $conn->error;
    }
    $conn->close();    
  */  
?>