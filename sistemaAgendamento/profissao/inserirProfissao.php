<?php
    //acesso ao banco
    include '../conexao.php';
    
    //dados do filme a ser inserido
    $id                      = $_REQUEST['id'];
    $codigo     			=	$_REQUEST['codigo'];
    $descricao       		=	$_REQUEST['descricao'];

	
	//query
    $query = "INSERT INTO funcoes (codigo, descricao)
    VALUES ('$codigo', '$descricao')";
	
		
	$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!!!");	
	header('Location:../profissao.php');

	
?>