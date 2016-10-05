<?php
include "conecta.php";
$msg=$_REQUEST["msg"];
$nomeAtendente=$_COOKIE["nomeAtendente"];

// use esta linha para evitar problemas de acentuaчуo (caso seu BD esteja com outra codificaчуo)
$msg=utf8_decode($msg); 

if(!empty($msg)) {
	// verifica se hс usuсrio conectado
	$res = mysqli_query($con, "SELECT * FROM chat WHERE origem='C'");
	if(mysqli_num_rows($res)>0)
		$res = mysqli_query($con, "INSERT INTO chat VALUES ('$nomeAtendente','A','$msg')");
}
?>