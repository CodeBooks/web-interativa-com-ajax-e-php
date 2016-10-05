function trataDados(){
	var cabecalhos = ajax.getAllResponseHeaders();
	document.getElementById("saida").style.backgroundColor="yellow";
	document.getElementById("saida").innerHTML="<pre>"+cabecalhos+"</pre>";
}