<?php
include "conecta.php";
import_request_variables("gc");
if(!empty($msg)) {
	$res = mysql_query("SELECT * FROM chat WHERE origem='C'");
	if(mysql_num_rows($res)>0)
		$res = mysql_query("INSERT INTO chat VALUES ('$nomeAtendente','A','$msg')");
}
?>