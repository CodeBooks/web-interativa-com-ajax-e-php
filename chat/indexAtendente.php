<?php
$senhaChat = "teste";  // defina aqui a senha
$nomeAtendente = "ATENDENTE";  // defina aqui o nome do atendente

// exibe formulário de login
if(!isset($_POST["senha"]) || $_POST["senha"]!=$senhaChat)	{ 
?>
		<html>
		<body>
		<h2 align="center">Login do atendente</h2>
		<form name="login" method="post" action="indexAtendente.php">
		  <div align="center">
			<p>Senha: <input name="senha" type="password" id="senha" size="15" maxlength="15"></p>
			<p><input name="iniciar" type="submit" id="iniciar" value="Iniciar atendimento"></p>
		  </div>
		</form>
		</body>
		</html>
<?php	
}
else {	// inicia o chat
	include "conecta.php";
	$res = mysqli_query($con, "INSERT INTO chat VALUES('$nomeAtendente','A','')");
	setcookie("nomeAtendente",$nomeAtendente);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Web Interativa com Ajax e PHP</title>
<script language="javascript" src="bibliotecaAjax.js"></script>
<script language="javascript" src="chat2.js"></script>
</head>

<body>
<h2 align="center">Atendimento via chat </h2>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td bgcolor="#FFFF99">
	<div id="texto" style="width:600px; height:300px; overflow:auto">
	
	</div>
	</td>
  </tr>
  <tr>
    <td><form name="formAjax" action="javascript:void%200" onSubmit="EnviaMsg(this.msg.value); return false">
      Sua Mensagem:
      <input name="msg" type="text" id="msg" size="50" maxlength="150">
      <input type="submit" name="Submit" value="Enviar">
    </form></td>
  </tr>
</table>
<p align="center"><a href="javascript:NovoAtendimento();">Finaliza atendimento atual</a> &nbsp;&nbsp;&nbsp;
<a href="logout.php">ENCERRAR CHAT (LOGOUT)</a></p>
</body>
</html>
<?php
}
?>