<?php
    //acesso ao banco
    include 'conexao.php';
    
    //dados do filme a ser inserido
    $descricaoFuncao 		=	$_REQUEST['descricaoFuncao'];
	$codigoFuncao			=	$_REQUEST['codigoFuncao'];
	
	//query
	$query = "INSERT INTO `localdb`.`tfuncoes`(`codigoFuncao`,`descricaoFuncao`)
VALUES ('".$codigoFuncao."','".$descricaoFuncao."')";
	
		
	$resultado = mysqli_query($con, $sql) or die ("erro em inserir no banco!!!");	
	header('Location:funcao.php');
	
?>