<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");

// array de preços
$produtos = array (
	"p1" => "29.90",
	"p2" => "35.00",
	"p3" => "40.50",
	"p4" => "50.90",
	"p5" => "120.00"
);

$codigo = $_GET["cod"];
if(isset($produtos[$codigo]))
	echo $produtos[$codigo];
else
	echo "0.00";
?>
