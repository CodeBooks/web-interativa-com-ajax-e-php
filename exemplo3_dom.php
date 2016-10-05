<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");

// cria o documento e os elementos, com seus respectivos valores (nodos texto)
$meuXML = new DOMDocument('1.0');
$nodoRaiz = $meuXML->createElement('dados');
$nome = $meuXML->createElement('nome', $_POST["nome"]);
$cidade = $meuXML->createElement('cidade', $_POST["cidade"]);
$estado = $meuXML->createElement('estado', $_POST["estado"]);
$pais = $meuXML->createElement('pais', $_POST["pais"]);

// define o nodo raiz e seus filhos
$meuXML->appendChild($nodoRaiz);
$nodoRaiz->appendChild($nome);
$nodoRaiz->appendChild($cidade);
$nodoRaiz->appendChild($estado);
$nodoRaiz->appendChild($pais);

// retorna o resultado ao navegador
header("Content-type: application/xml");
echo $meuXML->saveXML();
?>
