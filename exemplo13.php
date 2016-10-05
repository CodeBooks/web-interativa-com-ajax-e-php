<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de modelos
$modelos = array (
	'chevrolet' => '["Celta", "Corsa", "Prisma"]',
	'fiat' => '["Uno", "Palio", "Idea"]',
	'ford' => '["Fiesta", "Focus", "Fusion"]',
	'toyota' => '["Corolla", "Etios", "Hilux"]'
);

$marca = $_GET["marca"];
if(isset($modelos[$marca]))
	echo $modelos[$marca];
?>
