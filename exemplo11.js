window.onload = function(){
	var marca = document.getElementById("marca");
	marca.onchange = function() { mostraModelos(marca); }
}

function mostraModelos(marca){
	if (marca == null) { return; }
	var escolhida = marca.options[marca.selectedIndex].value;
	var url="exemplo11.php?marca="+encodeURIComponent(escolhida);
	requisicaoHTTP("GET",url,true);
}

function trataDados(){
	var info = ajax.responseText;  // obtém a resposta como string
	var arrayOpcoes = eval(info);	// converte para um array JSON

	// cria a nova lista
	var listaNova = document.createElement("select");
	listaNova.setAttribute("name","modelos");
	criaOpcoes(listaNova, arrayOpcoes);
	
	// exibe a nova lista na camada já existente
	var camada = document.getElementById("exibirAqui");
	limpa(camada);
	camada.appendChild(listaNova);
}

// cria opções, adicionando-as à lista
function criaOpcoes(lista, opcoes) {
	if(opcoes == null || opcoes.length==0) { return;}
	var op = null;
	for(var i=0; i<opcoes.length; i++) {
		op = document.createElement("option");
		op.appendChild(document.createTextNode(opcoes[i]));
		lista.appendChild(op);
	}
}
// remove todos os filhos do nodo fornecido
function limpa(elemento){
    if(elemento != null && elemento.hasChildNodes()){
        for(var i=0; i<elemento.childNodes.length; i++){
            elemento.removeChild(elemento.firstChild);
        }
    }
}