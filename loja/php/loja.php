<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";

if(isset($_GET["inicio"]) || isset($_GET["busca"]) || isset($_GET["categoria"]))	// lista produtos
	include "listaProdutos.php";
elseif(isset($_GET["detalhes"]))	// exibe os detalhes do produto escolhido
	include "mostraDetalhes.php";
elseif(isset($_GET["carrinho"]) || isset($_GET["frete"]) || isset($_GET["quantidade"]))	// atualiza carrinho de compras
	include "carrinho.php";
elseif(isset($_GET["limpar"]))	// limpa o carrinho
	include "limpaCarrinho.php";
elseif(isset($_GET["validaUsuario"]))	// encerra pedido e vai para a validaчуo do usuсrio
	include "validaUsuario.php";
elseif(isset($_GET["novoUsuario"]))	// criaчуo de novo usuсrio
	include "novoUsuario.php";

else echo "ERRO: favor acessar a home da loja!";
?>