<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";
$mensagens="";
$res = mysqli_query($con, "SELECT nome,msg FROM chat WHERE origem='C' and msg<>''");
for($i=0;$i<mysqli_num_rows($res);$i++){
	$dados = mysqli_fetch_row($res);
	$nome = $dados[0];
	$msg = $dados[1];
	$mensagens .= "<p style=\"background-color:#E9E9E9\"><b>$nome:</b> $msg</p>";
	$res2 = mysqli_query($con, "DELETE FROM chat WHERE origem='C' and msg='$msg'");
}
echo $mensagens;
?>