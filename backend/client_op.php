<?php include "./conexao.php"; ?>

<?php 
    $op = $_GET["op"];    
    
    if($op != 3){
        $nome = $_POST["clientName"];
        $cnpj_cpf = $_POST["cnpj_cpf"];
        $endereco = $_POST["inputAddress"];
        $cidade = $_POST["inputCity"];
        $estado = $_POST["inputState"];
        $end = "$endereco "." $cidade ". "$estado";
        $contato = $_POST["inputPhone"];
        $email = $_POST["inputEmail"];        

        if($op == 1){
            if( isset( $_POST["clientName"] ) ){
                $operacao_register = "INSERT INTO clientes 
                (nome, cnpj_cpf, endereco, email, contato) 
                VALUES 
                ('$nome', '$cnpj_cpf', '$end', '$email', '$contato') ";

                if ($conn->query($operacao_register) === TRUE) {
                    header("location: ../client.php");
                    exit();
                } else {
                    echo "Error: " . $operacao_register . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }else
        if($op == 2){            
            if( isset( $_POST["clientName"] ) ){
                $id = $_GET["id"];

                $operacao_update = "UPDATE clientes SET
                nome='$nome', cnpj_cpf='$cnpj_cpf', endereco='$end', contato='$contato', email = '$email' 
                WHERE id='$id'";

                if ($conn->query($operacao_update) === TRUE) {
                    header("location: ../pages_uni/client_uni.php?id=".$id);
                    exit();
                } else {
                    echo "Error: " . $operacao_update . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }
    }
  ?>