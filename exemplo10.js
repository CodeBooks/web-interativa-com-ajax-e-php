window.onload = function(){
	var estado = document.getElementById("estado");
	estado.onblur = function() { exibeCidades(estado); }
}

function exibeCidades(estado){
	if (estado == null) { return; }
	var opcoes = estado.options;
	var lista = "";
	var selecionados = new Array();
	var i=0,j=0,k=0;
	
	// armazena os estados selecionados em um array
	for(i=0; i<opcoes.length ; i++)
		if(opcoes[i].selected) {
			selecionados[j] = opcoes[i].value;
			j++;
		}
		
	// cria uma string com os estados separados por vírgula
	for(k = 0; k < selecionados.length; k++){
		if(k < selecionados.length-1 ) { lista += selecionados[k]+",";}
		else {lista +=selecionados[k]; }
	}
	
	var url="exemplo10.php?estados="+encodeURIComponent(lista);
	requisicaoHTTP("GET",url,true);
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var resposta = document.getElementById("resposta");
	resposta.innerHTML = info;
}