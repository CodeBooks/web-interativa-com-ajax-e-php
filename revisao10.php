<?php
/*	--- COMANDOS para executar no MySQL ---
	create table livros (
		id int,
		titulo varchar(100),
		autor varchar(100),
		primary key(id)
	);
	
	insert into livros values(1,'Desenvolvendo Websites com PHP','Juliano Niederauer');
	insert into livros values(2,'Guia PostgreSQL','Juliano Niederauer');
*/

$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "test";
$con = mysqli_connect($servidor, $usuario, $senha,$banco);
$res = mysqli_query($con, "SELECT titulo,autor FROM livros");
$num_livros = mysqli_num_rows($res);
echo "Existem $num_livros livros cadastrados no sistema.";
mysqli_close($con);
?>
