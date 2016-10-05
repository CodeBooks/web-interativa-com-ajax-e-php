var dadosAtuais;	// array que guarda os dados atuais da linha antes de editá-la
var linhaEmEdicao = null;	// guardar o id da linha a ser editada, incluída ou excluída
var linhasNovas = 0;	// variável auxiliar

// prepara uma linha para edição
function EditarLinha(idLinha) {
	if(!linhaEmEdicao) {
		linhaEmEdicao = idLinha;
		// obtém a linha a ser editada e altera sua cor
		var linha = document.getElementById(idLinha);
		linha.className='linhaSelecionada';
		var celulas = linha.cells;

		// salva os dados atuais (para o caso de cancelamento)
		SalvaDados(idLinha);
		
		// cria os campos de texto editáveis
		celulas[1].innerHTML = '<input type="text" name="nome" value="'+celulas[1].innerHTML+'">';
		celulas[2].innerHTML = '<input type="text" name="preco" value="'+celulas[2].innerHTML+'">';
		celulas[3].innerHTML = '<a href="#" onclick="Atualizar()">Atualizar</a><br>'+
								'<a href="#" onclick="Cancelar()">Cancelar</a>';
		celulas[4].innerHTML = '&nbsp;';
	}
	else alert("Você já está editando um registro!");
}

// exclui uma linha da tabela
function ExcluirLinha(idLinha) {
	if(!linhaEmEdicao) {
		var linha = document.getElementById(idLinha);
		linha.className='linhaSelecionada';
		if(confirm("Tem certeza que deseja excluir este registro?")) {
			Aviso(1);	// exibe o aviso "Aguarde..."
			linhaEmEdicao = idLinha;
			var celulas = document.getElementById(idLinha).cells;
			var cod = celulas[0].innerHTML;
			var url="tabelaDados.php?acao=excluir&cod="+cod;
			requisicaoHTTP("GET",url,true);
		}
		else linha.className='linha';
	}
	else alert("Você está com um registro aberto. Feche-o antes de prosseguir.");
}

function NovoRegistro() {
	// se houver linha sendo editada, cancela edição
	if(linhaEmEdicao)
		alert("Você está com um registro aberto. Feche-o antes de prosseguir.");
	else {
		// insere uma nova linha na tabela
		proxIndice = document.getElementById('minhaTabela').rows.length-1;
		var novaLinha = document.getElementById('minhaTabela').insertRow(proxIndice);
		novaLinha.className='linhaSelecionada';
	
		// define o id da nova linha (que será usado em caso de edição/exclusão)
		novoId = "nova"+linhasNovas;
		novaLinha.setAttribute('id',novoId);
		linhasNovas++;
		linhaEmEdicao = novoId;
	
		// insere as células na linha criada
		var novasCelulas = new Array(5);
		for(var i=0; i<novasCelulas.length; i++)
			novasCelulas[i] = novaLinha.insertCell(i);
	
		// cria os campos do formulário
		novasCelulas[0].innerHTML = '*'; // código
		novasCelulas[1].innerHTML = '<input type="text" name="nome">'; // nome
		novasCelulas[2].innerHTML = '<input type="text" name="preco">'; // preço
		novasCelulas[3].innerHTML = '<a href="#" onclick="Cadastrar()">Cadastrar</a>'; // botão de cadastro
		novasCelulas[4].innerHTML = '<a href="javascript:CancelarInclusao()">Cancelar</a>'; // botão de cancelamento
	}
}

// salva os dados atuais da linha em um array
function SalvaDados(idLinha){
	var celulas = document.getElementById(idLinha).cells;
	dadosAtuais = new Array(celulas.length);
	for(var i=0; i<celulas.length; i++)
		dadosAtuais[i] = celulas[i].innerHTML;
}

// cancela a edição de uma linha
function Cancelar() {
	// volta o formato original
	var linha = document.getElementById(linhaEmEdicao);
	linha.className='linha';

	// coloca os dados anteriores
	var celulas	 = linha.cells;
	for(var i=0; i<dadosAtuais.length; i++)
		celulas[i].innerHTML = dadosAtuais[i];
	linhaEmEdicao=null;
}

// cancela a inclusão de uma linha, excluindo-a
function CancelarInclusao() {
	var linha = document.getElementById(linhaEmEdicao);
	linha.parentNode.removeChild(linha); 
	linhasNovas--;
	linhaEmEdicao=null;
}

// atualiza o conteúdo da linha
function Atualizar() {
	Aviso(1);	// exibe o aviso "Aguarde..."
	var meuForm = document.forms.formulario;
	var dados = ObtemDadosForm(meuForm);
	var cod = dadosAtuais[0];
	var url="tabelaDados.php?acao=atualizar";
	url += "&cod="+cod+"&"+dados;
	requisicaoHTTP("GET",url,true);
}

// chamada programa PHP que cadastra no banco de dados
function Cadastrar () {
	Aviso(1);
	var meuForm = document.forms.formulario;
	var dados = ObtemDadosForm(meuForm);
	var url="tabelaDados.php?acao=cadastrar&"+dados;
	requisicaoHTTP("GET",url,true);
}

// coloca os dados do formulário em formato de query string
function ObtemDadosForm(meuForm) {
	var parametros = new Array();
	// percorre os elementos do formulário
	for(var i=0; i<meuForm.elements.length; i++) {
		var param = meuForm.elements[i].name;
		param += "=";
		param += encodeURIComponent(meuForm.elements[i].value);
		parametros.push(param);
	}
	// retona os parâmetros separados por &, para uso na query string
	return parametros.join("&");
}

// exibe ou oculta a mensagem de espera
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

// trata a resposta do servidor, de acordo com a operação realizada
function trataDados(){
	var resposta = ajax.responseText;
	var linha = document.getElementById(linhaEmEdicao);
	
	if(resposta=="atualizou") {		// registro foi atualizado
		// volta o estilo antigo
		linha.className='linha';
		var celulas	 = linha.cells;
		// coloca os novos valores nas células
		var meuForm = document.forms.formulario;
		var nome = meuForm.nome.value;
		var preco = meuForm.preco.value;
		celulas[1].innerHTML = nome;
		celulas[2].innerHTML = preco;
		celulas[3].innerHTML = dadosAtuais[3]; // botão de edição
		celulas[4].innerHTML = dadosAtuais[4]; // botão de exclusão
		linhaEmEdicao=null;
	}
	else if(resposta=="excluiu") {		// registro foi excluído
		linha.parentNode.removeChild(linha); 
		linhaEmEdicao=null;
	}
	else if(resposta.substring(0,9)=="cadastrou") {	// registro foi incluído
		linha.className='linha';
		var celulas	 = linha.cells;
		
		// obtém o código gerado para o produto no banco de dados
		novoCodigo = resposta.substring(10);
		
		// coloca os novos valores nas células
		var meuForm = document.forms.formulario;
		var nome = meuForm.nome.value;
		var preco = meuForm.preco.value;
		celulas[0].innerHTML = novoCodigo;
		celulas[1].innerHTML = nome;
		celulas[2].innerHTML = preco;
		celulas[3].innerHTML = '<a href="#" onclick="EditarLinha(\''+linhaEmEdicao+'\');">Editar</a>';
		celulas[4].innerHTML = '<a href="#" onclick="ExcluirLinha(\''+linhaEmEdicao+'\');">Excluir</a>';
		linhaEmEdicao=null;
	}
	else // mensagem de erro
		alert(resposta);
	Aviso(0);
}
