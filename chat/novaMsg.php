<?php
session_start();
$idConversa = session_id();
include "conecta.php";
$msg=$_REQUEST["msg"];
$nomeCliente=$_COOKIE["nomeCliente"];

// use esta linha para evitar problemas de acentuação (caso seu BD esteja com outra codificação)
$msg=utf8_decode($msg); 

if(!empty($msg)) {
	// verifica se a sessão do usuário ainda está aberta
	$res = mysqli_query($con, "SELECT * FROM chat WHERE nome='$idConversa' and msg=''");
	if(mysqli_num_rows($res)>0)
		$res = mysqli_query($con, "INSERT INTO chat VALUES ('$nomeCliente','C','$msg')");
	else
		echo "<p>ATENDIMENTO J&Aacute; ENCERRADO! <a href=\"indexCliente.php\">Voltar</a></p>";
}
?>