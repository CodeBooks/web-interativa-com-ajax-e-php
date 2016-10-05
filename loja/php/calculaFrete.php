<?php
// calcula o peso atual dos produtos do carrinho
$pesoTotal = 0;
foreach($carrinhoAtual as $id=>$quant)
{
	$res = mysqli_query($con, "SELECT peso FROM produto WHERE idProduto=$id");
	$dados = mysqli_fetch_row($res);
	$pesoTotal += $quant*$dados[0];
}

// define o frete de acordo com o peso e local
if(isset($_GET["frete"]))			// usuбrio escolheu novo local
	$localFrete = $_GET["frete"];
elseif(isset($_COOKIE["localFrete"]))
	$localFrete = $_COOKIE["localFrete"];
else
	$localFrete = "";
	
$localFrete=utf8_decode($localFrete); // use esta linha para evitar problemas de acentuaзгo (caso seu BD esteja com outra codificaзгo)
	
$res = mysqli_query($con, "SELECT preco FROM frete WHERE local='$localFrete' AND pesoLimite>$pesoTotal ORDER BY pesoLimite");
if(mysqli_num_rows($res)>0)
{
	$dados = mysqli_fetch_row($res);
	$valorFrete = $dados[0];
	setcookie("localFrete",$localFrete);
}
else $valorFrete = 0; // frete nгo disponнvel para o local/peso atual
setcookie("valorFrete",$valorFrete);
?>