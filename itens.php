<?php
    session_start();
    // Recupera dados "nome" e "quantidade"
    $nome_produto = $_REQUEST["nome"];
    $qt = $_REQUEST["qt"];
    
    // Faz conexão com o banco e seleciona produto com igual $nome_produto
    include "./backend/conexao.php"; 
    $operacao_consult =  "SELECT* FROM produtos WHERE nome = '$nome_produto'";
    $resultado = mysqli_query($conn, $operacao_consult);
    $prod = mysqli_fetch_assoc($resultado);

    $total = $qt * $prod["preco_custo"];
    // cria array com dados da lista e incrementa em $_SESSION["lista"]
    $dados_lista = array("cod"=>$prod["id"], "nome"=>$prod["nome"], "preco"=>$prod["preco_custo"], "qt"=>$qt, "total"=>$total);
    array_push($_SESSION["lista"], $dados_lista); 
    
    // imprime a tabela com os itens adicionado
    $Totalqt = 0;// quantidade total de produtos
    $Totaldin = 0; // somatoria dos valores totais do produtos
    
    echo "
        <table class='table col-5' >
            <thead>
                <tr class='theadtr'>
                <th scope='col'>Cod</th>
                <th scope='col'>Produto</th>
                <th scope='col'>R$ Uni</th>
                <th scope='col'>Qt</th>                    
                <th scope='col'>Total</th>
                </tr>
            </thead>
            <tbody>";
                foreach ($_SESSION["lista"] as $item) {
                    echo "<tr>
                            <td>".$item["cod"]."</td>
                            <td>".$item["nome"]."</td>
                            <td>R$ ".$item["preco"].",00</td>
                            <td>".$item["qt"]."</td>
                            <td>R$ ".$item["total"].",00</td>
                        </tr>";
                    $Totalqt += $item["qt"];
                    $Totaldin += $item["total"];
                }
            echo    "<tr style='background: #ececec'>
                    <th scope='col'>Totais</th>
                    <th scope='col'></th>
                    <th scope='col'>
                    <th scope='col'>".$Totalqt."</th>       
                    <th scope='col' id='totalVProdutos'>R$ ".$Totaldin.",00</th>
                </tr>                  
            </tbody>
        </table>   
        <div class='group mt-5 justify-content-around'>
            <h4>Valor Total da compra</h4>
            <h3 class='ms-4' id='TotalCompra' style='color:#198754;'>R$ ".$Totaldin.",00</h3>
        </div>";  
?>