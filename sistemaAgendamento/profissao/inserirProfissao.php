<?php
    //acesso ao banco
    include '../conexao.php';
    
    //dados do filme a ser inserido
    $codigoFuncao			=	$_REQUEST['codigoFuncao'];
    $descricaoFuncao 		=	$_REQUEST['descricaoFuncao'];

	
	//query
$query = "INSERT INTO localdb.tfuncoes (codigoFuncao, descricaoFuncao)
VALUES ('$codigoFuncao', '$descricaoFuncao')";
	
		
	$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!!!");	
	header('Location:../profissao.php');

	
?>