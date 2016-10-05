<?php
include "conecta.php";
session_start();
$idConversa = session_id();		// obtém o identificador da sessão do usuário

// testa se atendente está online
$res = mysqli_query($con, "SELECT nome FROM chat WHERE origem='A' and msg=''");
if(mysqli_num_rows($res)==0) {	
	echo "<html>";
	echo "<body>";
	echo "<h2>No momento o atendente não está online! Tente mais tarde.</h2>";
	echo "</body>";
	echo "</html>";
	exit();
}
else {	
	$dados = mysqli_fetch_row($res);
	$nomeAtendente=$dados[0];
	// testa se atendente está ocupado
	$res = mysqli_query($con, "SELECT * FROM chat WHERE origem='C' and nome<>'$idConversa'");
	if(mysqli_num_rows($res)>0) {
		echo "<html>";
		echo "<body>";
		echo "<h2>O atendente está ocupado! Por favor tente mais tarde.</h2>";
		echo "</body>";
		echo "</html>";
		exit();
	}
}

// exibe formulário de login
if(!isset($_POST["nome"]) || empty($_POST["nome"]))	{ 
?>
		<html>
		<body>
		<h2 align="center">Atendimento via chat </h2>
		<form name="login" method="post" action="indexCliente.php">
		  <div align="center">
			<p>Seu nome: <input name="nome" type="text" id="nome" size="50" maxlength="60"></p>
			<p><input name="iniciar" type="submit" id="iniciar" value="Iniciar atendimento"></p>
		  </div>
		</form>
		</body>
		</html>
<?php	
}
else {	// inicia o chat
	$nome = ucfirst($_POST["nome"]);
	setcookie("nomeCliente",$nome);
	$res = mysqli_query($con, "INSERT INTO chat VALUES('$idConversa','C','')");
	$res = mysqli_query($con, "INSERT INTO chat VALUES('$nome','C','[Entrou no chat]')");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Web Interativa com Ajax e PHP</title>
<script language="javascript" src="bibliotecaAjax.js"></script>
<script language="javascript" src="chat.js"></script>
</head>

<body>
<h2 align="center">Atendimento via chat </h2>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td bgcolor="#ECFFEC">
	<div id="texto" style="width:600px; height:300px; overflow:auto">
	<p style="background-color:#E9E9E9"><b><?php echo $nomeAtendente; ?>:</b> Olá <?php echo $nome; ?>, seja bem-vindo ao nosso atendimento online. Em que posso ajudar?</p>
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
<p align="center"><a href="javascript:window.close();">Sair do chat</a></p>

</body>
</html>
<?php
}
?>