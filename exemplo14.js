var expressao, confere;

window.onload=function(){
	document.forms[0].onsubmit=function() {
		testaEmail(this.email.value);
		return false;
	};
};

function emailValido(email){
	// não pode ser vazio, tem que conter "@", "."
	// e não pode conter espaços
	if (email == null || email.length == 0 ||
		email.indexOf(".") == -1 ||
		email.indexOf("@") == -1 ||
		email.indexOf(" ") != -1)
			return false;

    // testa os caracteres antes do "@"
	// não pode começar nem terminar com ponto
	// deve ter ao menos dois caracteres word (letras, números, underline)
	// opcionalmente com um ponto entre eles
	expressao=/(^\w{1,}\.?\w{1,})@/;
	confere = expressao.exec(email);
	if (!confere) return false;

	// testa os caracteres depois do "@"
    // deve ter ao menos 2 caracteres seguidos por um ponto, 
	// seguido por zero ou mais ocorrências de ao menos 2 
	// caracteres (terminando com um ponto), seguidos por 2 ou 3 caracteres

	expressao=/@(\w{2,}\.(\w{2,}\.)?[a-zA-Z]{2,3})$/;
	confere = expressao.exec(email);
	if(!confere)
		return false;

	return true;
}

function testaEmail(email){
    if(emailValido(email))
    {
		var url="exemplo14.php?email="+encodeURIComponent(email);
		requisicaoHTTP("GET",url,true);
    }
	else
		alert ("O formato do e-mail digitado é inválido!");
}

function trataDados(){
	var valido = ajax.responseText;
	if(valido=="S")
		alert("PARABÉNS! O e-mail é válido e foi aceito pelo servidor!");
	else
		alert("OPSSS! Este e-mail já existe em nosso cadastro!");
}
