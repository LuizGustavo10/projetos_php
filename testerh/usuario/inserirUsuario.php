<?php
include '../conexao.php';

$nomeUsuario = $_REQUEST['nomeUsuario'];
$senhaUsuario = $_REQUEST['senhaUsuario'];
$codigoUsuario = $_REQUEST['codigoUsuario'];

$query = "INSERT INTO localdb.tusuario (codigoUsuario, nomeUsuario, senhaUsuario)
          VALUES ('$codigoUsuario', '$nomeUsuario', '$senhaUsuario')";

$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!");
header('Location:../principal.php');

?>