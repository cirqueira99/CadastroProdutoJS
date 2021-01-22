<?php include "./conexao.php"; ?>

<?php 
    $op = $_GET["op"];
    
    if($op != 3){
        $nome = $_POST["providierName"];
        $cnpj_cpf = $_POST["cpf_cnpj"];
        $endereco = $_POST["inputAddress"];
        $cidade = $_POST["inputCity"];
        $estado = $_POST["inputState"];
        $end = "$endereco "." $cidade ". "$estado";
        $contato = $_POST["phone"];
        $email = $_POST["email"];        

        if($op == 1){
            if( isset( $_POST["providierName"] ) ){
                $operacao_register = "INSERT INTO fornecedores 
                (nome, cnpj_cpf, endereco, email, contato) 
                VALUES 
                ('$nome', '$cnpj_cpf', '$end', '$email', '$contato') ";

                if ($conn->query($operacao_register) === TRUE) {
                    header("location: ../provider.php");
                    exit();
                } else {
                    echo "Error: " . $operacao_register . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }else
        if($op == 2){
            if( isset( $_POST["providierName"] ) ){
            $id = $_GET["id"];
            $operacao_update = "UPDATE fornecedores SET
            nome='$nome', cnpj_cpf='$cnpj_cpf', endereco='$end', contato='$contato', email = '$email' 
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
    }
  ?>