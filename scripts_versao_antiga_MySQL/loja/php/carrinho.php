<?php
if(isset($_COOKIE["carrinhoAtual"])) $carrinhoAtual = $_COOKIE["carrinhoAtual"];
else $carrinhoAtual = array();

// inserção de produto no carrinho
if($_GET["carrinho"]!=0)
{
	$id = $_GET["carrinho"];
	if(!isset($carrinhoAtual[$id]))
		$carrinhoAtual[$id] = 1;
	setcookie("carrinhoAtual[$id]",$carrinhoAtual[$id]);
}

// alteração da quantidade do produto
if(isset($_GET["quantidade"]))
{
	$partes = explode("-",$_GET["quantidade"]);
	$idProd = $partes[0];
	$novaQuant = $partes[1];
	if($novaQuant==0) { // exclui do carrinho
		setcookie("carrinhoAtual[$idProd]",false);
		unset($carrinhoAtual[$idProd]);
	}
	else
	{
		setcookie("carrinhoAtual[$idProd]",$novaQuant);
		$carrinhoAtual[$idProd] = $novaQuant;
	}
}

// cálculo do novo frete
include "calculaFrete.php";

// exibição do carrinho de compras
echo "<form action=\"javascript:void%200\">";
echo "<p class=\"titulo\">Seu Carrinho de Compras</p>";
echo "<div align=\"center\">";
echo "<p><table width=\"90%\" border=\"1\">";
echo "<tr class=\"fundocinza\">";
echo "<td>Qtd</td>";
echo "<td>Produto</td>";
echo "<td>Preço</td>";
echo "</tr>";

$valorTotal = 0;

foreach($carrinhoAtual as $id=>$quant)
{
	$res = mysql_query("SELECT nome,preco,precoPromocao FROM produto WHERE idProduto=$id");
	$dados = mysql_fetch_row($res);
	$nome = $dados[0];
	$preco = $dados[1];
	$precoPromocao = $dados[2];
	if($precoPromocao>0) {
		$precoPromocao *= $quant;
		$valorTotal += $precoPromocao;
		$preco = number_format($precoPromocao,2,",",".");
	}
	else {
		$preco *= $quant;
		$valorTotal += $preco;
		$preco = number_format($preco,2,",",".");
	}
	echo "<tr>";
	echo "<td><input type=\"text\" name=\"$id\" value=\"$quant\" ";
	echo "size=\"1\" maxlength=\"2\" onblur=\"javascript:AtualizaQuantidade(this);\"></td>";
	echo "<td>$nome</td>";
	echo "<td>R\$ $preco</td>";
	echo "</tr>";
}

// lista de seleção do frete
echo "<tr class=\"fundocinza\">";
echo "<td>&nbsp</td>";
echo "<td>";
include "listaFretes.php";
echo "</td>";
echo "<td><span id=\"valorFrete\" class=\"frete\">";
if($valorFrete>0) 
	echo "R\$ ".number_format($valorFrete,2,",",".");
else
	echo "N/D"; // frete não disponível para o local/peso atual
echo "</span></td>";
echo "</tr>";

// mostra total da compra
$valorTotal += $valorFrete;
$valorTotal = number_format($valorTotal,2,",",".");
echo "<tr class=\"fundocinza\">";
echo "<td>&nbsp</td>";
echo "<td class=\"preco\">TOTAL DA COMPRA</td>";
echo "<td class=\"preco\">R\$ $valorTotal</td>";
echo "</tr>";

echo "</table></p></div></form>";

echo "<p align=\"center\" class=\"descricao\">Ao alterar uma quantidade, clique em<br>QUALQUER LUGAR DA PÁGINA para atualizar o carrinho</p>";
echo "<p align=\"center\"><a href=\"javascript:Loja('limpar',0);\"><img src=\"figuras/limpar.gif\" border=\"0\"></a> ";
echo "&nbsp;&nbsp;&nbsp;<a href=\"javascript:Loja('validaUsuario',0);\"><img src=\"figuras/fechar.gif\" border=\"0\"></a></p>";
?>