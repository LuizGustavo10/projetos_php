<?php
include '../conexao.php';

$nome = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$cpf = $_REQUEST['cpf'];
$codigo = $_REQUEST['codigo'];

$query = "INSERT INTO aulacerta.usuario (codigo, nome, cpf, senha)
          VALUES ('$codigo', '$nome','$cpf', '$senha')";

$resultado = mysqli_query($con, $query) or die ("erro em inserir no banco!");
header('Location:../principal.php');

?>
