<?php
    include "../conexao.php";
    $id = $_REQUEST['id'];

    $query = "DELETE FROM usuario  WHERE usuario.id=".$id;

    $resultado = mysqli_query($con, $query) or die ("Erro ao excluir banco!");

    header('Location:../principal.php');
?>