<?php  

	//acesso ao banco
    include '../conexao.php';
    
    //dados do cliente a ser inserido 
	$codigo		=	$_REQUEST['codigoFuncao'];
	
	//query
	$query = "DELETE FROM tfuncoes WHERE tfuncoes.codigoFuncao=".$codigo;

	$resultado = mysqli_query($con, $query) or die ("erro em excluir dado no banco!");
	header('Location:../profissao.php');

?>