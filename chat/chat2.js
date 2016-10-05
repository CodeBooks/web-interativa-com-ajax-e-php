// dispara a função que lê o servidor
window.onload = function(){
	window.setInterval ('ChecaMsg()', 2000);
}
// envia nova mensagem ao servidor
function EnviaMsg(msg){
	ExibirMsg("<p><b>VOCÊ:</b> "+msg+"</p>");
	var url="novaMsg2.php?msg="+encodeURIComponent(msg);
	document.getElementById("msg").value='';
	requisicaoHTTP("GET",url,true);
}

// busca novas mensagens no servidor
function ChecaMsg(){
	requisicaoHTTP("GET","checaMsg2.php",true);
}

function ExibirMsg(msg){
	var saida = document.getElementById("texto");
	var nova = document.createElement('div');
	nova.innerHTML = msg;
	saida.appendChild(nova);
	saida.scrollTop = 100000;  // rolagem automática
}

function NovoAtendimento() {
	var saida = document.getElementById("texto");
	saida.innerHTML = '';	// limpa texto do chat
	requisicaoHTTP("GET","excluiMsg.php",true);
}

// atualiza texto do chat
function trataDados(){
	var info = ajax.responseText;
	if(info) 
		ExibirMsg(info);
}
