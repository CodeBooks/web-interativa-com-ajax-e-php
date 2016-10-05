<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de usuários supostamente existentes
$usuarios = array ("juliano", "joao");
$valido = 1;
$username = strtolower($_GET["username"]);

for($i=0 ; $i<sizeof($usuarios); $i++)	// compara o username digitado com os elementos do array
	if($usuarios[$i] == $username)
		$valido = 0;

if($valido) echo "Username OK!";
else echo "Username já existe! Escolha outro!";
?>
