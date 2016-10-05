window.onload = function(){
	var texto = document.getElementById("username");	
	if(texto != null)
		texto.onblur = function() { testaUsuario(texto.value); }
}

function testaUsuario(username){
	if(username) {
		var url="exemplo7.php?username="+encodeURIComponent(username);
		requisicaoHTTP("GET",url,true);
	}
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	alert(info);
}