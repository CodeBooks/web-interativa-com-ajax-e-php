<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de informações sobre os times
$times = array (
	"gremio" => "Time de PORTO ALEGRE (RS)<br>Estádio: Arena do Grêmio",
	"palmeiras" => "Time de SÃO PAULO (SP)<br>Estádio: Palestra Itália",
	"cruzeiro" => "Time de BELO HORIZONTE (MG)<br>Estádio: Mineirão",
	"flamengo" => "Time do RIO DE JANEIRO (RJ)<br>Estádio: Maracanã",
	"criciuma" => "Time de Criciúma (SC)<br>Estádio: Heriberto Hulse"
);

$time = $_GET["time"];
if(isset($times[$time]))
	echo $times[$time];
else
	echo "Time não encontrado!";
?>
