<?php

include '../conexao.php';

if (isset($_REQUEST['id'])) {

    $id                 =   $_REQUEST['id'];
    $funcionario	    =	$_REQUEST['funcionario'];
	$data				=	$_REQUEST['data'];
	$hora_inicio	    =	$_REQUEST['hora_inicio'];
	$hora_fim		    =	$_REQUEST['hora_fim'];
	$curso				=	$_REQUEST['curso'];
    $obs				=	$_REQUEST['obs'];

    $query = "UPDATE agenda SET
    data = '$data',
    hora_inicio = '$hora_inicio',
    hora_fim = '$hora_fim',
    curso = '$curso',
    funcionario = '$funcionario',
    obs = '$obs'
    WHERE id = '$id'";

    $resultado = mysqli_query($con, $query) or die("Erro em atualizar em banco!");
    header('Location:../agenda.php');
} else {
    header('Location:../agenda.php');
}
