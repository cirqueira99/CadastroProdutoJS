<?php
    include "../backend/conexao.php"; 
    
    $id_compra = intval( $_REQUEST["id_compra"] );
    $data = $_REQUEST["data"];
    $obs = $_REQUEST["obs"];

    $operacao_update = "UPDATE compras SET
        data_entrega='$data', observacao='$obs'
        WHERE id = '$id_compra'";
    
    if ($conn->query($operacao_update) === TRUE) {
        header("location: ../pages_uni/purchases_uni.php?id=".$id);
        exit();
    } else {
        echo "Error: " . $operacao_update . "<br>" . $conn->error;
    }
    $conn->close();    
?>