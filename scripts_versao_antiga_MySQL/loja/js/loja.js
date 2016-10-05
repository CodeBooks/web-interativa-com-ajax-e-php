window.onload = function(){
	Loja('inicio', 0);
}

function Loja(secao, parametro){
	Aviso(1);
	var url="php/loja.php?"+secao+"="+encodeURIComponent(parametro);
	requisicaoHTTP("GET",url,true);
}

function AtualizaQuantidade(campo){
	var id = campo.name;
	var quant = campo.value;
	Loja('quantidade',id+'-'+quant);	
}

function Aviso(exibir) {
	var saida = document.getElementById("avisos");
	if(exibir){
		saida.className = "aviso";
		saida.innerHTML = "Aguarde...processando!";
	}
	else {
		saida.className = "";
		saida.innerHTML = "";
	}
}

function trataDados(){
	var info = ajax.responseText;
	var saida = document.getElementById("conteudo");
	saida.innerHTML = info;
	Aviso(0);
}
