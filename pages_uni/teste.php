<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select id="item" style="width:200px;">
        <option selected="">Escolha um Produto</option>  
        <option>2</option>  
        <option>3</option>  
        <option>4</option>  
    </select>        
    <div><button onclick="add_itens()">Adicionar</button></div>
    <span id="mostrar"></span>

    <script>
        function add_itens() {
            var item = document.getElementById('item').value;
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mostrar").innerHTML = this.responseText;
                }
            };

            
            xmlhttp.open("GET", "./testeAjax.php?item="+item, true);
            xmlhttp.send();
        }
    </script>
    <?php
        $n = "Carlos";
        $lista = array("nome"=>$n, "idade"=> 11, "sexo"=>"Masc");
        $listaA = array();
        array_push($listaA, $lista);
        $lista = array("nome"=>"Mari", "idade"=> 20, "sexo"=>"Fem");
        array_push($listaA, $lista);
        print_r($listaA);
        $soma = 0;
        foreach($listaA as $l){
            echo "<br>";
            $soma += $l["idade"];
        }
        echo $soma;
    ?>
</body>
</html>