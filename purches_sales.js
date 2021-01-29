  


function add_itens() {
  var nome_produto = document.getElementById('selectProduto').value;
  var qt = document.getElementById('qt').value;
 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("mostrar").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "./itens.php?nome="+nome_produto+"&qt="+qt, true);
  xmlhttp.send();
 
  
}

function atualiza_valores(valor){
    var valorFrete = document.getElementById("vFrete").value;
    var valor_Compra = document.getElementById("totalVProdutos").innerText; 
    valor_Compra = valor_Compra.substring(3);

    valorFrete = parseFloat(valorFrete);
    valor_Compra = parseFloat(valor_Compra);
    console.log(valorFrete)
    console.log(valor_Compra)
    var valor_total =  valor_Compra + valorFrete;
    console.log(valor_total)
    document.getElementById("TotalCompra").innerHTML = "R$ "+valor_total+",00";
    //document.getElementById("TotalCompra").innerHTML = valor_vProd;  


}