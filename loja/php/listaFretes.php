<?php
echo "FRETE: <select name=\"local\" onChange=\"javascript:Loja('frete', this.options[this.selectedIndex].value);\">";
echo "<option>Escolha o local de entrega</option>\n";
$res = mysqli_query($con, "SELECT distinct(local) FROM frete ORDER BY local");
for($i=0; $i<mysqli_num_rows($res); $i++)
{
	$dados = mysqli_fetch_row($res);
	$local = $dados[0];
	echo "<option ";
	if($local==$localFrete)
		echo "selected ";
	echo "value=\"$local\">$local</option>\n";
}
echo "</select>";
?>