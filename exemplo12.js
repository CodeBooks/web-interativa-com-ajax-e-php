window.onload = function(){
var todosCampos = document.getElementsByTagName("input");
	if(todosCampos != null){
		for(var i=0; i<todosCampos.length; i++) {
			if(todosCampos[i].type == "checkbox"){
				todosCampos[i].onclick=function(){
					enviaCheckbox(this)
				};
			}
		}
	}
}

function enviaCheckbox(caixa){
	if (caixa == null) { return; }
	var nomeCaixa = caixa.name;
	var url="exemplo12.php?nomeCaixa="+nomeCaixa+"&valor="+encodeURIComponent(caixa.value);
	if(caixa.checked)
		url += "&marcada=SIM";
	requisicaoHTTP("GET",url,true);
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	if(info != null){
		var saida = document.getElementById("saida");
		saida.innerHTML = info;
	}
}