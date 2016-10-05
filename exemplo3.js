function trataDados(){
	var info = "<h3>Dados recebidos pelo servidor</h3>";
	var meuXML = ajax.responseXML;  // obtém a resposta como XML
	var raiz = meuXML.documentElement;
	var nodos;
	if(raiz.hasChildNodes()) {
		nodos = raiz.childNodes;
		for(var i=0; i<nodos.length ; i++) {
			info += nodos[i].nodeName+" - ";
			if(nodos[i].hasChildNodes())
				info += nodos[i].firstChild.nodeValue+"<br>";
			else
				info += "Vazio <br>";
		}
	}
	
	document.getElementById("campoResposta").style.backgroundColor="yellow";
	document.getElementById("campoResposta").innerHTML=info;
}