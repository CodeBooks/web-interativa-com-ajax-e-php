<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";
$mensagens="";
$res = mysql_query("SELECT nome,msg FROM chat WHERE origem='A' and msg<>''");
for($i=0;$i<mysql_num_rows($res);$i++){
	$dados = mysql_fetch_row($res);
	$nome = $dados[0];
	$msg = $dados[1];
	$mensagens .= "<p style=\"background-color:#E9E9E9\"><b>$nome:</b> $msg</p>";
	$res2 = mysql_query("DELETE FROM chat WHERE origem='A' and msg='$msg'");
}
echo $mensagens;
?>