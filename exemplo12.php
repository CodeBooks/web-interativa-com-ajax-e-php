<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

$nomeCaixa = $_GET["nomeCaixa"];
$valor = $_GET["valor"];
if(isset($_GET["marcada"]))
	echo "O servidor já foi informado que você <b>MARCOU</b> a checkbox <b>$nomeCaixa</b>, na opção de valor <b>$valor</b>.";
else
	echo "O servidor já foi informado que você <b>DESMARCOU</b> a checkbox <b>$nomeCaixa</b>, na opção de valor <b>$valor</b>.";
?>
