<?php

$enderecobd = "localhost";
$dbname = "aulacerta";
$usuariobd = "root";
$senhabd = "";

$con = mysqli_connect($enderecobd, $usuariobd, $senhabd, $dbname);

if(!$con){
    die("Erro na conexão do Banco de Dados:".mysqli_connect_error());
}

?>