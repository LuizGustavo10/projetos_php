<?php  

	//acesso ao banco
    include 'conexao.php';
    
    //dados do filme a ser inserido 
	$codigoUsuario		=	$_REQUEST['codigoUsuario'];
	
	
	//query
	$query = "DELETE FROM tusuario WHERE tusuario.codigoUsuario=".$codigoUsuario;

	$resultado = mysqli_query($con, $query) or die ("erro em excluir dado no banco!");

	header('Location:adm.php');

?>