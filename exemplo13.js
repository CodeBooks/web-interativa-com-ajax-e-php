window.onload = function(){
	var todosCampos = document.getElementsByTagName("input");
	if(todosCampos != null) {
		for(var i=0; i<todosCampos.length; i++) {
			if(todosCampos[i].type=="radio"){ todosCampos[i].onclick=function(){
				mostraModelos(this)};
			}
		}
	}
}

function mostraModelos(marca){
	if (marca == null) { return; }
	var escolhida = marca.value;
	var url="exemplo13.php?marca="+encodeURIComponent(escolhida);
	requisicaoHTTP("GET",url,true);
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var arrayOpcoes = eval(info);	// converte para um array JSON
	criaCaixas(arrayOpcoes);
}

function criaCaixas(opcoes) {
	var saida = document.getElementById("exibirAqui");
	var nova;

	// remove todas checkboxes existentes
	while(saida.hasChildNodes()){
		for(var i=0; i<saida.childNodes.length; i++){
			saida.removeChild(saida.firstChild);
		}
	}

	// cria as checkboxes usando o array de opções
	for(var i=0; i < opcoes.length;i++) {
		nova = document.createElement("input");
		nova.setAttribute("type","checkbox");
		nova.setAttribute("name","modelo");
		nova.setAttribute("value",opcoes[i]);
		saida.appendChild(nova);
		saida.appendChild(document.createTextNode(opcoes[i]));
		saida.appendChild(document.createElement("br"));
	}
}