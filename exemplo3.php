<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");

// obtém os dados do formulário
$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$pais = $_POST["pais"];

// cria a string XML
$meuXML = "<?xml version=\"1.0\" ?>";
$meuXML .= "<dados>";
$meuXML .= "<nome>$nome</nome>";
$meuXML .= "<cidade>$cidade</cidade>";
$meuXML .= "<estado>$estado</estado>";
$meuXML .= "<pais>$pais</pais>";
$meuXML .= "</dados>";

// retorna o resultado ao navegador
header("Content-type: application/xml");
echo $meuXML;
?>
