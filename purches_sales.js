  
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

function atualiza_valores(){
    var valorFrete = document.getElementById("vFrete").value;
    var valor_Compra = document.getElementById("totalVProdutos").innerText; 
    valor_Compra = valor_Compra.substring(3);
    
    valorFrete==""? valorFrete = 0 : valorFrete = parseFloat(valorFrete);;
    
    valor_Compra = parseFloat(valor_Compra);
    var valor_total =  valor_Compra + valorFrete;
    document.getElementById("TotalCompra").innerHTML = "R$ "+valor_total+",00";
}

function mostrar_por_data(button){
    var but = button.innerText;
    // controle para exibir
    if( but == "Exibir Todas as Compras" ){
        var data1 = "";
        var data2 = "";
    }else{
        var data1 = document.getElementById('date1').value;
        var data2 = document.getElementById('date2').value;
    }
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("list_compras").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./buttons_functions/purchases_search.php?data1="+data1+"&data2="+data2+"&b="+but, true);
    xmlhttp.send();
}

function mostrar_botoes_intervalo(){
    // pega os elementos divs e abribui as variáveis
    var div_dt1 = document.querySelector("#div_dt1");
    var div_dt2 = document.querySelector("#div_dt2");
    var but_pesquisar = document.querySelector("#but_pesquisar");
   
    // limpa os elementos html 
    div_dt1.innerHTML = '';
    div_dt2.innerHTML = '';
    but_pesquisar.innerHTML = '';
   
    // cria os elementos html
    var input_dt1 = document.createElement('input');
    input_dt1.setAttribute('type', 'date');
    input_dt1.setAttribute('class', 'form-control text-secondary ms-4');
    input_dt1.setAttribute('id', 'date1');

    var input_dt2 = document.createElement('input');
    input_dt2.setAttribute('type', 'date');
    input_dt2.setAttribute('class', 'form-control text-secondary ms-4');
    input_dt2.setAttribute('id', 'date2');

    var input_but_pesquisar = document.createElement('button');
    input_but_pesquisar.setAttribute('class', 'btn btn-secondary ms-4');
    input_but_pesquisar.setAttribute('onclick', 'mostrar_por_data(this);');
    
    var input_but_pesquisarText = document.createTextNode('Pesquisar');
   
    // liga os elementos criados
    div_dt1.appendChild(input_dt1);
    div_dt2.appendChild(input_dt2);

    input_but_pesquisar.appendChild(input_but_pesquisarText);
    but_pesquisar.appendChild(input_but_pesquisar);
}

function alterar_dados_compra(){
    var id = document.getElementById('id_compra').value;
    var data = document.getElementById('date2').value;
    var obs = document.getElementById('obs').value;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            return this.responseText;
        }
    };
    xmlhttp.open("GET", "./buttons_functions/purchases_alter.php?data="+data+"&obs="+obs, true);
    xmlhttp.send();

}

function exluir_compa(){

}