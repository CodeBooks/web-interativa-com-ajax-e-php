<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Web Interativa com Ajax e PHP</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
<script language="javascript" src="bibliotecaAjax.js"></script>
<script language="javascript" src="sugestoes.js"></script>
</head>
<body>
<div align="center">
<h2>Auto-sugest&atilde;o em Ajax </h2>

<form>
<p>Busca de produtos:
<input name="palavras" type="text" id="palavras" size="50" maxlength="50" onKeyUp="Sugestoes();"> 
<span id="aviso" class="aviso">Processando...</span>
</p></form>
</div>
</body>
</html>
