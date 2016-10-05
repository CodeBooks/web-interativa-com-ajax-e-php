<?php
// calcula o peso atual dos produtos do carrinho
$pesoTotal = 0;
foreach($carrinhoAtual as $id=>$quant)
{
	$res = mysql_query("SELECT peso FROM produto WHERE idProduto=$id");
	$dados = mysql_fetch_row($res);
	$pesoTotal += $quant*$dados[0];
}

// mostra o frete de acordo com o peso e local
if(isset($_GET["frete"]))			// usuário escolheu novo local
	$localFrete = $_GET["frete"];
elseif(isset($_COOKIE["localFrete"]))
	$localFrete = $_COOKIE["localFrete"];
else
	$localFrete = "";
	
$res = mysql_query("SELECT preco FROM frete WHERE local='$localFrete' AND pesoLimite>$pesoTotal ORDER BY pesoLimite");
if(mysql_num_rows($res)>0)
{
	$dados = mysql_fetch_row($res);
	$valorFrete = $dados[0];
	setcookie("localFrete",$localFrete);
}
else $valorFrete = 0; // frete não disponível para o local/peso atual
setcookie("valorFrete",$valorFrete);
?>