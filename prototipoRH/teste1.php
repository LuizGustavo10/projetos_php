<?php
	include 'conexao.php';

	$codigoUsuario = $_GET['codigo'];

	if(!empty($codigoUsuario)){
		echo $codigoUsuario."<br>";

		$query   = "select * from tusuario where codigoUsuario=".$codigoUsuario;
  	$dados   = mysqli_query($con,$query);
  	$usuario = mysqli_fetch_assoc($dados);
		echo $dados;
		var_dump($usuario);

		echo "<br>";
		echo isset($usuario)?$usuario['nomeUsuario']:"";
		echo "<br>";
		echo isset($usuario)?$usuario['codigoUsuario']:"";

	}

?>
