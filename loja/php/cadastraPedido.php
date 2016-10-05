<?php
// verifica se o usuário calculou o frete e se há produtos no carrinho
if(isset($_COOKIE["valorFrete"]) && $_COOKIE["valorFrete"]>0 && isset($_COOKIE["carrinhoAtual"]))
{
	$frete = $_COOKIE["valorFrete"];
	$data = date("Y-m-d");
	$res = mysqli_query($con, "INSERT INTO pedido(email,data,valorTotal,precoFrete) VALUES('$email','$data',0,'$frete')");
	$idPedido = mysqli_insert_id ($con);	// obtém o id gerado para o pedido (campo auto-incremento)
	
	// insere os itens do pedido
	$carrinhoAtual = $_COOKIE["carrinhoAtual"];
	$valorTotal = 0;
	foreach($carrinhoAtual as $id=>$quant)
	{
		$res = mysqli_query($con, "SELECT preco,precoPromocao FROM produto WHERE idProduto=$id");
		$dados = mysqli_fetch_row($res);
		$preco = $dados[0];
		$precoPromocao = $dados[1];
		if($precoPromocao>0)
			$preco = $precoPromocao;
		$valorTotal += $preco*$quant;
		$res = mysqli_query($con, "INSERT INTO itemPedido VALUES($idPedido,$id,$preco,$quant)");
	}
	$res = mysqli_query($con, "UPDATE pedido SET valorTotal=$valorTotal WHERE idPedido=$idPedido");

	// limpa o carrinho de compras
	setcookie("localFrete", false);
	if(isset($_COOKIE["carrinhoAtual"])) {
		$carrinhoAtual = $_COOKIE["carrinhoAtual"];
		foreach($carrinhoAtual as $id=>$quant)
			setcookie("carrinhoAtual[$id]", false);
	}
	
	echo "<p class=\"titulo\">Parab&eacute;ns, seu pedido foi conclu&iacute;do sob o n&uacute;mero $idPedido.</p>";
	echo "<p class=\"descricao\">Favor realizar o dep&oacute;sito na Ag. 6666, Conta 8888, Banco Tabajara.</p>";
}
else 
{
	if(!isset($_COOKIE["carrinhoAtual"]))	// carrinho vazio
		echo "<p class=\"erro\">Seu carrinho est&aacute; vazio! Insira os produtos desejados.</p>";
	else	// frete não calculado
		echo "<p class=\"erro\">Voc&ecirc; n&atilde;o calculou o frete! Favor escolher o local de entrega.</p>";
	echo "<p align=\"center\"><a href=\"javascript:Loja('carrinho',0);\">Clique aqui</a></p>";
}
exit();
?>