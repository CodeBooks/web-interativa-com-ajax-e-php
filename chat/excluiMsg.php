<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";
import_request_variables("c");
$res = mysqli_query($con, "DELETE FROM chat");
$res = mysqli_query($con, "INSERT INTO chat VALUES('$nomeAtendente','A','')");
echo "<p>Chat reiniciado...aguardando conexão de novo cliente</p>";
?>