<?php

include '../conexao.php';

if(isset($_REQUEST['id'])){
    $id               = $_REQUEST['id'];
    $descricao = $_REQUEST['descricao'];
    $codigo   = $_REQUEST['codigo'];

    $query = "UPDATE funcoes SET
    descricao = '$descricao',
    codigo = '$codigo'
    WHERE id = '$id'";

    $resultado = mysqli_query($con, $query) or die ("Erro em atualizar em banco!");
    header('Location:../profissao.php');
}else{
    header('Location:../profissao.php');
}



?>