<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de palavras
$palavras = array (
	"book" => "livro",
	"dog" => "cachorro",
	"cat" => "gato",
	"monkey" => "macaco",
	"orange" => "laranja"
);

$palavra = $_GET["palavra"];
if(isset($palavras[$palavra]))
	echo $palavras[$palavra];
else
	echo "NÃO ENCONTRADA";
?>
