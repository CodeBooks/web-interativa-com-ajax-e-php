var timeEscolhido;

function obtemInfo(time){
	if(time) {
		timeEscolhido = time;
		var url="exemplo6.php?time="+time;
		requisicaoHTTP("GET",url,true);
	}
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var div = document.getElementById("saida");
	div.className = timeEscolhido;
	div.innerHTML=info;
}