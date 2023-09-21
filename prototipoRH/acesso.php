<!-- <php

include 'conexao.php';

//dados do usuario da sessão
$codigoUsuario  = $_REQUEST['codigoUsuario'];
$senhaUsuario   = $_REQUEST['senhaUsuario'];




//verificou se há usuairo
$query  = "SELECT * FROM tusuario AS func WHERE func.codigoUsuario='".$codigoUsuario."' AND func.senhaUsuario='".$senhaUsuario."'";
$resultado = mysql_query($query,$con) or die("Erro acessar usuario!");

$linha = mysql_fetch_assoc($resultado);


///Caso consiga logar cria a sessão
if (mysql_num_rows ($resultado) > 0) {
    // session_start inicia a sessão
    session_start();
    $_SESSION['usuarioLogado']  = $linha['nomeUsuario'];
    $_SESSION['codigoUsuario']  = $codigoUsuario;
    $_SESSION['senhaUsuario']   = $senhaUsuario;

	header('location:adm.php');
	
}
 
//Caso contrário redireciona para a página de autenticação
else {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['codigoUsuario']);
    unset ($_SESSION['senhaUsuario']);
 
    //Redireciona para a página de autenticação
    header('location:index.php');

     
}


   
?> -->

<?php
include 'conexao.php';

// Dados do usuário da sessão
$codigoUsuario = $_REQUEST['codigoUsuario'];
$senhaUsuario = $_REQUEST['senhaUsuario'];

// Verificar se há usuário
$query = "SELECT * FROM tusuario AS func WHERE func.codigoUsuario='" . $codigoUsuario . "' AND func.senhaUsuario='" . $senhaUsuario . "'";
$resultado = mysqli_query($con, $query) or die("Erro ao acessar o usuário!");

$linha = mysqli_fetch_assoc($resultado);

// Caso consiga logar, cria a sessão
if (mysqli_num_rows($resultado) > 0) {
    // session_start inicia a sessão
    session_start();
    $_SESSION['usuarioLogado'] = $linha['nomeUsuario'];
    $_SESSION['codigoUsuario'] = $codigoUsuario;
    $_SESSION['senhaUsuario'] = $senhaUsuario;

    header('location: adm.php');
} else {
    // Destruir a sessão
    session_unset();
    session_destroy();

    // Redireciona para a página de autenticação
    header('location: index.php');
}
?>