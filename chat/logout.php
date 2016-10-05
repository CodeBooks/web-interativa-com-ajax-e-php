<?php
$gmtDate = gmdate("D, d M Y H:i:s"); 
header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");

include "conecta.php";
$res = mysqli_query($con, "DELETE FROM chat");
header("Location:indexAtendente.php");
?>