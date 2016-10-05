<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

// array de cidades
$cidades = array (
	"BA" => "Salvador, Feira de Santana",
	"CE" => "Fortaleza",
	"DF" => "Brasília",
	"GO" => "Goiânia, Anápolis",
	"MG" => "Belo Horizonte, Poços de Caldas",
	"PR" => "Curitiba, Londrina",
	"RJ" => "Rio de Janeiro, Volta Redonda", 
	"RS" => "Porto Alegre, Novo Hamburgo",
	"SC" => "Florianópolis, Criciúma",
	"SP" => "São Paulo, Campinas"
);

$estados = $_GET["estados"];
$vetor = explode(",",$estados);
foreach($vetor as $estado)
	if(isset($cidades[$estado]))
		echo "No estado $estado, temos revendedores em <b>".$cidades[$estado]."</b><br>";
?>
