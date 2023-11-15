<?php

    include 'conexao.php';

    $codigoUsuario = $_REQUEST['codigoUsuario'];
    $senhaUsuario = $_REQUEST['senhaUsuario'];

    $query = "SELECT * FROM usuario WHERE codigo = '$codigoUsuario' 
    AND senha = '$senhaUsuario'";

    $resultado = mysqli_query($con, $query) or die("Erro ao acessar o usuário!");

    //busca uma linha especifica da busca sql- carrega registro
    $linha = mysqli_fetch_assoc($resultado);

    if(mysqli_num_rows($resultado) > 0){
        session_start();
        $_SESSION['usuarioLogado'] = $linha['nomeUsuario'];
        $_SESSION['codigoUsuario'] = $codigoUsuario;
        $_SESSION['senhaUsuario'] = $senhaUsuario;

        header('location: principal.php');
    }else{
        session_unset();
        session_destroy();
        header('location: index.php');
        
    }

?>