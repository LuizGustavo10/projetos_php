<?php  

	//acesso ao banco
    include '../conexao.php';
    
    //dados do cliente a ser inserido 
	$id		=	$_REQUEST['id'];
	
	//query
	$query = "DELETE FROM funcoes WHERE id=".$id;

	$resultado = mysqli_query($con, $query) or die ("erro em excluir dado no banco!");
	header('Location:../profissao.php');

?>