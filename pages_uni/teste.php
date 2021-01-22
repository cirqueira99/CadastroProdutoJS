<?php
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 id="h">5</h3>    
    <button onclick="add()" >click</button>
    <div id="tbody">

    </div>
    <script>
        var v = document.getElementById('h').innerText;
        
        
        function add(){
            var tbody = document.getElementById("tbody");
            
            tbody.innerHTML = "<?php atualizaLista(); ?>";
        }
    </script>
    <?php 
    function atualizaLista(){
        $valor = "<script>document.write(v)</script>";
        $lis="<h3>$valor</h3>";
        echo $lis;

    }
  ?>
    
</body>
</html>