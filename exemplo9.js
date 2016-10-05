window.onload = function(){
	var estado = document.getElementById("estado");
	estado.onchange = function() { exibeFrete(estado); }
}

function exibeFrete(estado){
	if (estado == null) { return; }
	selecionado = estado.options[estado.selectedIndex].value;
	var url="exemplo9.php?estado="+encodeURIComponent(selecionado);
	requisicaoHTTP("GET",url,true);
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var resposta = document.getElementById("frete");
	resposta.innerHTML = info;
}