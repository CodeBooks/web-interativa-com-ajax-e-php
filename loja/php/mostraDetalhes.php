<?php
$id = $_GET["detalhes"];
$res = mysqli_query($con, "SELECT * FROM produto WHERE idProduto=$id");
if(mysqli_num_rows($res)>0)
{
	$dados = mysqli_fetch_row($res);
	$idProduto = $dados[0];
	$nome = $dados[1];
	$descricao = $dados[2];
	$preco = number_format($dados[3],2,",",".");
	$promocao = number_format($dados[4],2,",",".");
	$peso = $dados[5];
	$idCategoria = $dados[6];

	echo "<p><img src=\"figuras/item.gif\" width=\"14\" height=\"14\"> $nome</p>";
	echo "<p class=\"descricao\">$descricao</p>";
	if($promocao=="0,00")
		echo "<p><span class=\"preco\">Preço: R\$ $preco</span></p>";
	else
		echo "<p><span class=\"preco\">Promoção: de <span class=\"promocao\">R\$ $preco</span> por R\$ $promocao </span></p>";

	echo " <p><a href=\"javascript:Loja('carrinho','$idProduto');\"><img src=\"figuras/comprar.gif\" border=\"0\"></a></p>";
}
else echo "Produto não encontrado!";
?>