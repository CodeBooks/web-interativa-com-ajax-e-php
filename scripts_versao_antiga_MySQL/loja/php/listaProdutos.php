<?php
if(isset($_GET["inicio"])) {		// lista 10 produtos quaisquer
	echo "<p class=\"titulo\">Destaques</p>";
	$sql = "SELECT idProduto,nome,preco,precoPromocao FROM produto LIMIT 10";
}
elseif(isset($_GET["categoria"])) {		// lista por categoria
	$cat = $_GET["categoria"];
	$sql = "SELECT idProduto,nome,preco,precoPromocao FROM produto WHERE idCategoria=$cat";
}
else {				// busca produto pela palavra digitada
	$palavra = $_GET["busca"];
	$sql = "SELECT idProduto,nome,preco,precoPromocao FROM produto WHERE nome like '%$palavra%'";
}
$res = mysql_query($sql);
if(mysql_num_rows($res)==0)
	echo "<p class=\"titulo\">Nenhum produto encontrado!</p>";
else
	for($i=0; $i<mysql_num_rows($res); $i++)
	{
		$dados = mysql_fetch_row($res);
		$idProduto = $dados[0];
		$nome = $dados[1];
		$preco = number_format($dados[2],2,",",".");
		$promocao = number_format($dados[3],2,",",".");
		echo "<p><img src=\"figuras/item.gif\" width=\"14\" height=\"14\"> $nome<br>";
		if($promocao=="0,00")
			echo "<span class=\"preco\">Preço: R\$ $preco</span><br>";
		else
			echo "<span class=\"preco\">Promoção: de <span class=\"promocao\">R\$ $preco</span> por R\$ $promocao </span><br>";
		echo " <a href=\"javascript:Loja('detalhes','$idProduto');\"><img src=\"figuras/detalhes.gif\" border=\"0\"></a>";
		echo " <a href=\"javascript:Loja('carrinho','$idProduto');\"><img src=\"figuras/comprar.gif\" border=\"0\"></a></p>";
	}
?>