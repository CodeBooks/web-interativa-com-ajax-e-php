var aguardando = false;	// indica se há uma consulta em processamento

// cria a popup no carregamento da página
window.onload = function() {
	criarPopup();
}

// cria a div das sugestões, com uma tabela dentro
function criarPopup() {
	// cria a camada onde serão exibidas as sugestões
	var novaCamada = document.createElement('div');
	novaCamada.className = 'sugestoes';
	novaCamada.setAttribute('id','divPopup');

	// cria a tabela que ficará dentro da camada
	var tabela = document.createElement('table');
	tabela.setAttribute('id','tabela');
	tabela.setAttribute('bgcolor','#EEEEEE');
	tabela.setAttribute('border','0');
	tabela.setAttribute('cellspacing','0');
	tabela.setAttribute('cellpadding','0');
	novaCamada.appendChild(tabela);
	document.body.appendChild(novaCamada);
}

// ativa o programa servidor que retorna as sugestões
function Sugestoes() {
	var palavras =  document.getElementById('palavras');
	if(palavras.value.length>0) {
		if(!aguardando) {
			var url="sugestoes.php?palavras="+encodeURIComponent(palavras.value);
			requisicaoHTTP("GET",url,true);
			Aviso(true);
		}
	}
	else LimparSugestoes();
}

function MostrarSugestoes(dados) {
	LimparSugestoes();
	var linha, celula, texto;
	var tabela =  document.getElementById('tabela');
	var num = dados.getElementsByTagName('nome').length;
	if(num>0) {
		PosicionarCamada();
		for(var i=0; i<num; i++) {
			var sugestao = dados.getElementsByTagName('nome')[i].firstChild.data;
			linha = tabela.insertRow(tabela.rows.length);
			celula = linha.insertCell(0);
			celula.onmouseover = function() {this.className='comCor';};
			celula.onmouseout = function() {this.className='semCor';};
			celula.onclick = function() {PreencherCaixa(this);};
			celula.setAttribute('border','0');
			celula.innerHTML = sugestao;
		}
	}
}

// preenche a caixa de texto com a sugestão selecionada
function PreencherCaixa(valor) {
	var caixaTexto =  document.getElementById('palavras'); 
	caixaTexto.value = valor.firstChild.nodeValue;
	LimparSugestoes();
}

// limpa a camada de sugestões
function LimparSugestoes() {
	var camada =  document.getElementById('divPopup');
	camada.style.border = '0';
	var tabela = document.getElementById('tabela');
	while(tabela.hasChildNodes())
		tabela.removeChild(tabela.childNodes[0]);
}

// posiciona a camada de sugestões logo abaixo da caixa de texto
function PosicionarCamada() {
	var camada =  document.getElementById('divPopup');
	var tabela =  document.getElementById('tabela');
	var caixaTexto =  document.getElementById('palavras');

	var largura = caixaTexto.offsetWidth;
	var esq = CalcularPos(caixaTexto,'offsetLeft');
	var cima = CalcularPos(caixaTexto,'offsetTop') + caixaTexto.offsetHeight;
	
	camada.style.border = '#000000 1px solid';
	camada.style.left = esq + 'px';
	camada.style.top = cima + 'px';
	tabela.style.width = largura + 'px';
}

// função auxiliar para calcular a posição (offset) do campo
function CalcularPos(campo, atributo) {
	var posicao = 0;
	while(campo) {
		posicao += campo[atributo];
		campo = campo.offsetParent;
	}
	return posicao;
}

// exibe ou oculta o aviso "Processando..."
function Aviso(exibir) {
	aguardando = exibir;
	var aviso =  document.getElementById('aviso'); 
	if(exibir)
		aviso.style.visibility='visible';
	else
		aviso.style.visibility='hidden';
}

// trata a resposta do servidor
function trataDados(){
	var resposta = ajax.responseXML;
	Aviso(false);
	MostrarSugestoes(resposta);
}
