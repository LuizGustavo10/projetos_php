<?php
    //acesso ao banco
    include 'conexao.php';
    
    //dados do filme a ser inserido
    $nomeUsuario 	=	$_REQUEST['nomeUsuario'];
	$senhaUsuario	=	$_REQUEST['senhaUsuario'];
	$codigoUsuario =	$_REQUEST['codigoUsuario'];
	

	//query
$query = "INSERT INTO localdb.tusuario (codigoUsuario, nomeUsuario, senhaUsuario)
          VALUES ('$codigoUsuario', '$nomeUsuario', '$senhaUsuario')";

	$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!");
	header('Location:adm.php');
	
?>