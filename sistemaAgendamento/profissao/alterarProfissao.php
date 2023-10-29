<?php

include '../conexao.php';

if(isset($_REQUEST['codigoFuncao'])){
    $descricaoFuncao = $_REQUEST['descricaoFuncao'];
    $codigoFuncao = $_REQUEST['codigoFuncao'];

    $query = "UPDATE tfuncoes SET
    descricaoFuncao = '$descricaoFuncao',
    codigoFuncao = '$codigoFuncao'
    WHERE codigoFuncao = '$codigoFuncao'";

    $resultado = mysqli_query($con, $query) or die ("Erro em atualizar em banco!");
    header('Location:../profissao.php');
}else{
    header('Location:../profissao.php');
}



?>