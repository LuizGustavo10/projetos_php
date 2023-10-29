<?php

include '../conexao.php';

if(isset($_REQUEST['codigoFuncionario'])){

    $nomeFuncionario 	 		 =	$_REQUEST['nomeFuncionario'];
    $codigoFuncionario	 	 =	$_REQUEST['codigoFuncionario'];
    $salario							 =	$_REQUEST['salario'];
    $dataNascimento				 =	$_REQUEST['dataNascimento'];
    $funcao								 =	$_REQUEST['funcao'];

    $query = "UPDATE tfuncionario SET
    codigo = '$codigoFuncionario',
    nome = '$nomeFuncionario',
    salario = '$salario',
    dataNascimento = '$dataNascimento',
    funcao = '$funcao'
    WHERE codigoFuncionario = '$codigoFuncionario'";

    $resultado = mysqli_query($con, $query) or die ("Erro em atualizar em banco!");
    header('Location:../funcionario.php');
}else{
    header('Location:../funcionario.php');
}



?>