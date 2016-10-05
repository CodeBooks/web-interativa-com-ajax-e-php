<?php
include "conecta.php";
$res = mysql_query("SELECT * FROM categoria ORDER BY nomeCategoria");
for($i=0; $i<mysql_num_rows($res); $i++)
{
	$dados = mysql_fetch_row($res);
	$idCategoria = $dados[0];
	$nomeCategoria = $dados[1];
	echo "<a href=\"javascript:Loja('categoria','$idCategoria');\">$nomeCategoria</a><br>";
}
?>
<form action="javascript:void%200" onSubmit="Loja('busca',this.busca.value); return false;">
  <p>Busca<br><input name="busca" type="text" id="busca" size="10" maxlength="100">
  <br><input name="ok" type="submit" id="ok" value="Ok"></p>
</form>