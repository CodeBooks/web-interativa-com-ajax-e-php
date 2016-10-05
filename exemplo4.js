function obtemPreco(cod){
	if(cod) {
		var url="exemplo4.php?cod="+cod;
		requisicaoHTTP("GET",url,true);
	}
}

function trataDados(){
	var preco = ajax.responseText;  // obtém a resposta como string
	var quantidade = document.getElementById("quant").value;

	try{
		if(isNaN(preco)) { throw new Error("O preço retornado é inválido.");}
		if(isNaN(quantidade)) { throw new Error("A quantidade deve ser um número.");}
		var total = preco * quantidade;
		var resultado = total.toFixed(2);
		var info = "Valor total: R$ "+  FormataMoeda(resultado,".",",");
		document.getElementById("valorTotal").style.backgroundColor="yellow";
		document.getElementById("valorTotal").innerHTML=info;
	} catch (err) {
		document.getElementById("valorTotal").innerHTML="Ocorreu um erro: "+err.message;
	}

}

function FormataMoeda(num, separadorMilhar, separadorDecimal){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    len = num.length;
    for(i = 0; i < len; i++)
        if ((num.charAt(i) != '0') && (num.charAt(i) != separadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(num.charAt(i))!=-1) aux += num.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) num = '';
    if (len == 1) num = '0'+ separadorDecimal + '0' + aux;
    if (len == 2) num = '0'+ separadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += separadorMilhar;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        num = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        num += aux2.charAt(i);
        num += separadorDecimal + aux.substr(len - 2, len);
    }
    return num;
}