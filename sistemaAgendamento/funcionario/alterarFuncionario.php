<?php

include '../conexao.php';

if (isset($_REQUEST['codigo'])) {

    $id                  =    $_REQUEST['id'];
    $nome                =    $_REQUEST['nome'];
    $codigo              =    $_REQUEST['codigo'];
    $salario             =    $_REQUEST['salario'];
    $dataNascimento      = $_REQUEST['dataNascimento'];
    $funcao              =    $_REQUEST['funcao'];
    $cpf                 =    $_REQUEST['cpf'];
    $senha               =    $_REQUEST['senha'];

    $query = "UPDATE funcionario SET
    codigo = '$codigo',
    nome = '$nome',
    salario = '$salario',
    dataNascimento = '$dataNascimento',
    funcao = '$funcao'
    WHERE codigo = '$codigo'";

    $resultado = mysqli_query($con, $query) or die("Erro em atualizar em banco!");
    header('Location:../funcionario.php');
} else {
    header('Location:../funcionario.php');
}
