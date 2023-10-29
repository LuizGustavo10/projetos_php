<?php 

        //Senão tiver autenticado manda pro login
    if (!isset($_SESSION['codigoUsuario']) and !isset($_SESSION['senhaUsuario'])) {
        session_destroy();
        unset($_SESSION['codigoUsuario']);
        unset($_SESSION['senhaUsuario']);

        header('location:index.php');
    }


?>