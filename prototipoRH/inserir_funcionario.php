
<?php
    //acesso ao banco
    include 'conexao.php';
    
		
    //dados do filme a ser inserido
    $nomeFuncionario 	=	$_REQUEST['nomeFuncionario'];
	$codigoFuncionario	=	$_REQUEST['codigoFuncionario'];
	$salario			=	$_REQUEST['salario'];
	$dataNascimento		=	$_REQUEST['dataNascimento'];
	$funcao				=	$_REQUEST['funcao'];
	

	//query
	$query = "INSERT INTO `localdb`.`tfuncionario`(`codigoFuncionario`,`nomeFuncionario`,`salario`,`dataNascimento`,`funcao`)
VALUES (".$codigoFuncionario.",'".$nomeFuncionario."','".$salario."','".$dataNascimento."','".$funcao."')";
	
	$resultado = mysqli_query($con,$query) or die ("erro em inserir no banco!".mysqli_error($con));
	
	header('Location:funcionario.php');
	
?>