<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";
import_request_variables("g");

// cria a string XML
$meuXML = "<?xml version=\"1.0\" ?>";
$meuXML .= "<produtos>";
$res = mysql_query("SELECT nome FROM produtos WHERE nome LIKE '$palavras%' ORDER BY nome");
for($i=0; $i<mysql_num_rows($res); $i++) {
	$dados = mysql_fetch_row($res);
	$nome = $dados[0];
	$meuXML .= "<produto>";
	$meuXML .= "<nome>$nome</nome>";
	$meuXML .= "</produto>";
}
$meuXML .= "</produtos>";
// retorna o resultado ao navegador
header("Content-type: application/xml");
echo $meuXML;
?>