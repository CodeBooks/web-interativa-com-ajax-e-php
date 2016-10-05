<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");

include "conecta.php";
import_request_variables("c");
$res = mysql_query("DELETE FROM chat");
$res = mysql_query("INSERT INTO chat VALUES('$nomeAtendente','A','')");
echo "<p>Chat reiniciado...aguardando conex&atilde;o de novo cliente</p>";
?>