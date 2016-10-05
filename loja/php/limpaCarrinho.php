<?php
setcookie("localFrete", false);
if(isset($_COOKIE["carrinhoAtual"])) {
	$carrinhoAtual = $_COOKIE["carrinhoAtual"];
	foreach($carrinhoAtual as $id=>$quant)
		setcookie("carrinhoAtual[$id]", false);
}
echo "<p class=\"titulo\">Carrinho Vazio</p>";
?>