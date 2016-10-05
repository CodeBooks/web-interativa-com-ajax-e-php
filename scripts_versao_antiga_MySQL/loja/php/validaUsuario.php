<?php
if(isset($_POST["email"]) && isset($_POST["senha"])) {
	include "conecta.php";
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$res = mysql_query("SELECT email FROM usuario WHERE email='$email' AND senha='$senha'");
	if(mysql_num_rows($res)>0)	// usuário ok, conclui pedido
		include "cadastraPedido.php";
	else
		echo "<p class=\"erro\">Dados incorretos! Favor verificar seu e-mail e senha e tentar novamente!</p>";
}
?>
<p><a href="javascript:Loja('novoUsuario',0);">SOU CLIENTE NOVO</a></p>
<form id="formAjax" action="javascript:void%200" onSubmit="enviaDados('php/validaUsuario.php'); return false;">
  <p>J&Aacute; TENHO CADASTRO (digite seus dados) </p>
  <p>E-mail: <input name="email" type="text" maxlength="100"></p>
  <p>Senha: <input name="senha" type="password" size="20" maxlength="20"></p>
  <p><input name="concluir" type="submit" value="Concluir"></p>
</form>
