<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de preços de frete
$frete = array (
	"AC" => "15,00", "AL" => "14,00",
	"AM" => "14,00", "AP" => "14,00",
	"BA" => "13,00", "CE" => "13,00",
	"DF" => "11,00", "ES" => "11,00",
	"GO" => "10,00", "MA" => "13,00",
	"MG" => "9,00", "MS" => "14,00",
	"MT" => "12,00", "PA" => "15,00",
	"PB" => "14,00", "PE" => "14,50",
	"PI" => "15,00", "PR" => "9,00",
	"RJ" => "9,00", "RN" => "12,00",
	"RO" => "15,00", "RR" => "15,00",
	"RS" => "9,50", "SC" => "9,00",
	"SE" => "14,50", "SP" => "7,00",
	"TO" => "13,00"
);

$estado = $_GET["estado"];
if(isset($frete[$estado]))
	echo "O valor do frete é R\$".$frete[$estado];
?>
