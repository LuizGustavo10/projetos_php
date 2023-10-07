<?php
    include 'conexao.php';
    
    if(isset($_REQUEST['codigoUsuario'])){
        $nomeUsuario = $_REQUEST['nomeUsuario'];
        $codigoUsuario = $_REQUEST['codigoUsuario'];
        $senhaUsuario = $_REQUEST['senhaUsuario'];

        $query = "UPDATE tusuario SET nomeUsuario='$nomeUsuario', codigoUsuario='$codigoUsuario', senhaUsuario='$senhaUsuario' where codigoUsuario='$codigoUsuario'";
        $resultado = mysqli_query($con, $query) or die("2 - Erro em atualizar o banco!");
        header('Location:principal.php');
        
    }else{
        header('Location:principal.php');
    }
?>