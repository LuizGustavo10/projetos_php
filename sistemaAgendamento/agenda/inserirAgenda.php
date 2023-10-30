<?php
    //acesso ao banco
    include '../conexao.php';
    
    //dados do filme a ser inserido
	$data				=	$_REQUEST['data'];
	$hora_inicio	    =	$_REQUEST['hora_inicio'];
	$hora_fim		    =	$_REQUEST['hora_fim'];
	$curso				=	$_REQUEST['curso'];
	$funcionario	    =	$_REQUEST['funcionario'];
    $obs				=	$_REQUEST['obs'];

	
	//query
    $query = "INSERT INTO agenda (data, hora_inicio, hora_fim, curso, funcionario, obs)
    VALUES ('$data', '$hora_inicio', '$hora_fim','$curso','$funcionario','$obs')";
        
		
	$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!!!");	
	header('Location:../agenda.php');

	
?>

