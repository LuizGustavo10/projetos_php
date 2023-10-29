<?php
    include "../conexao.php";
    $codigoUsuario = $_REQUEST['codigoUsuario'];

    $query = "DELETE FROM tusuario  WHERE tusuario.codigoUsuario=".$codigoUsuario;

    $resultado = mysqli_query($con, $query) or die ("Erro ao excluir banco!");

    header('Location:../principal.php');
?>