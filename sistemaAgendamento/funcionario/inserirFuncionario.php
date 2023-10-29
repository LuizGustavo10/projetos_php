<?php
    //acesso ao banco
    include '../conexao.php';
    
    //dados do filme a ser inserido
    $nome 				=	$_REQUEST['nome'];
	$codigo				=	$_REQUEST['codigo'];
	$salario			=	$_REQUEST['salario'];
	$dataNascimento		=	$_REQUEST['dataNascimento'];
	$funcao				=	$_REQUEST['funcao'];
	$cpf			    =	$_REQUEST['cpf'];
    $senha				=	$_REQUEST['senha'];

	
	//query
    $query = "INSERT INTO aulacerta.funcionario (codigo, nome, salario, dataNascimento, funcao, cpf, senha)
    VALUES ('$codigo', '$nome', '$salario', '$dataNascimento','$funcao','$cpf','$senha')";
        
		
	$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!!!");	
	header('Location:../funcionario.php');

	
?>

