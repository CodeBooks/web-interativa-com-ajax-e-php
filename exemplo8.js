window.onload = function(){
	var palavra = document.getElementById("palavra");
	if(palavra != null)
		palavra.onblur = function() { traduz(palavra.value); }
}

function traduz(palavra){
	if(palavra) {
		var url="exemplo8.php?palavra="+encodeURIComponent(palavra);
		requisicaoHTTP("GET",url,true);
	}
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var resposta = document.getElementById("traducao");
	resposta.value = info;
}