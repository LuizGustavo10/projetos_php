<!-- <php

//acesso ao banco de dados   
$enderecobd = "localhost";   
$dbname = "localdb";       
                             
//dados do banco             
$usuariobd = "root"; //azure        
$senhabd = "";  //6#vWHD_$      

//conectar ao banco                                                                                   
$con   = mysql_connect($enderecobd,$usuariobd,$senhabd) or die ("1-Erro na conexão do Banco de Dados!");

//acessou ao banco dados	                                                 
$selbd = mysql_select_db($dbname,$con) or die ("1-Erro em selecionar Tabela!");

?> -->

<?php
// Acesso ao banco de dados
$enderecobd = "localhost";
$dbname = "localdb";

// Dados do banco
$usuariobd = "root"; // azure
$senhabd = ""; // 6#vWHD_$

// Conectar ao banco
$con = mysqli_connect($enderecobd, $usuariobd, $senhabd, $dbname);

// Verificar a conexão
if (!$con) {
    die("Erro na conexão do Banco de Dados: " . mysqli_connect_error());
}

// Agora você está conectado ao banco de dados.
?>




