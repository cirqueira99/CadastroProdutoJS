<?php include "./conexao.php"; ?>

<?php 
    $op = $_GET["op"];    
    
    if($op != 3){
        $nome = $_POST["employeeName"];
        $cpf = $_POST["cpf"];
        $contato = $_POST["inputPhone"];
        $email = $_POST["inputEmail"];        
        $endereco = $_POST["inputAddress"];
        $cidade = $_POST["inputCity"];
        $estado = $_POST["inputState"];
        $end = "$endereco "." $cidade ". "$estado";
        $carteira = $_POST["carteira"];
        $salario = $_POST["salario"];
        $cargo = $_POST["cargo"];
        $banco = $_POST["banco"];
        $agencia = $_POST["agencia"];
        $conta = $_POST["conta"];
        $bac = "$banco "."$agencia "."$conta ";
        
        $username = $_POST["username"];
        $senha =  md5($_POST["senha"]);
        $categoria = $_POST["categoria"];

        if($op == 1){
            if( isset( $_POST["employeeName"] ) ){
                
                $operacao_register_fun = "INSERT INTO funcionarios 
                (nome, cpf, endereco, email, contato, n_carteira, conta_banco, salario,	cargo) 
                VALUES 
                ('$nome', '$cpf', '$end', '$email', '$contato', '$carteira', '$bac', '$salario', '$cargo') ";

                if ($conn->query($operacao_register_fun) === TRUE) {
                    exit();
                } else {
                    echo "Error: " . $operacao_register_fun . "<br>" . $conn->error;
                }
                $conn->close();

                $servername = "localhost";
                $Username = "root";
                $password = "";
                $dbname = "JunkSystem";

                $conn = new mysqli($servername, $Username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $operacao_register_user = "INSERT INTO usuarios
                (user, senha, categoria, cpf_usuario) 
                VALUES 
                ('$username', '$senha', '$categoria', '$cpf')";

                if ($conn->query($operacao_register_user) === TRUE) {
                    header("location: ../employee.php");
                    exit();
                } else {
                    echo "Error: " . $operacao_register_user . "<br>" . $conn->error;
                }

                $conn->close();
            }
        }else
        if($op == 2){ 
            if( isset( $_POST["employeeName"] ) ){
                
                $id = $_GET["id"];

                $operacao_update = "UPDATE funcionarios SET
                nome='$nome', cpf='$cpf', endereco='$end', email='$email', contato='$contato', n_carteira='$carteira', conta_banco='$bac', salario='$salario',	cargo='$cargo'
                WHERE id='$id'";

                if ($conn->query($operacao_update) === TRUE) {
                    exit();
                } else {
                    echo "Error: " . $operacao_update . "<br>" . $conn->error;
                }
                $conn->close();

                $servername = "localhost";
                $Username = "root";
                $password = "";
                $dbname = "JunkSystem";
                $conn = new mysqli($servername, $Username, $password, $dbname);

                $operacao_update_user = "UPDATE usuarios SET
                user='$username', senha='$senha', categoria='$categoria', cpf_usuario='$cpf'
                WHERE cpf_usuario = '$cpf'";

                if ($conn->query($operacao_update_user) === TRUE) {
                    header("location: ../pages_uni/employee_uni.php?id=".$id);
                    exit();
                } else {
                    echo "Error: " . $operacao_update_user . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }
    }
  ?>