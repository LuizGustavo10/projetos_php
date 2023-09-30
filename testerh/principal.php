<?php
session_start();
include 'conexao.php';


$destino = "inserir_usuario.php";
$tituloFormulario = "Incluir Usuário";

//Senão tiver autenticado manda pro login
if( !isset($_SESSION['codigoUsuario']) and !isset($_SESSION['senhaUsuario'])){
session_destroy();
unset ($_SESSION['codigoUsuario']);
unset ($_SESSION['senhaUsuario']);

header('location:index.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Sistema RH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(Página atual)</span></a>
        <a class="nav-item nav-link" href="#">Destaques</a>
        <a class="nav-item nav-link" href="#">Preços</a>
        <a class="nav-item nav-link disabled" href="#">Desativado</a>
        </div>
    </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 menu">
            <ul class="list-group">
                <li class="list-group-item"><a href="adm.php"> Usuários </a></li>
                <li class="list-group-item"><a href="funcao.php"> Funções </a></li>
                <li class="list-group-item"><a href="funcionario.php"> Funcionários </a></li>
                <li class="list-group-item"><a href="sair.php"> Sair </a></li>
            
            </ul>
            </div>
            <div class="col-md-9">

            
            <div class="row">
                <div class="col-md-4 card">
                    <form action="inserirUsuario.php" method="POST">
                        <h1> Seja Bem Vindo <?php echo $_SESSION['usuarioLogado']; ?></h1>

                        <div class="form-group">
                            <label for="codigoUsuario">Matriculo - codUsuario</label>
                            <input name="codigoUsuario" type="text" class="form-control" id="codigoUsuario" value="<?php echo isset($usuario) ? $usuario['codigoUsuario']:""?>" >
                        </div>

                        
                        <div class="form-group">
                            <label for="nomeUsuario">Nome Usuário</label>
                            <input name="nomeUsuario" type="text" class="form-control" id="nomeUsuario" value="<?php echo isset($usuario) ? $usuario['nomeUsuario']:""?>" >
                        </div>

                        <div class="form-group">
                            <label for="senhaUsuario">Senha Usuário</label>
                            <input name="senhaUsuario" type="password" class="form-control" id="senhaUsuario" value="<?php echo isset($usuario) ? $usuario['senhaUsuario']:""?>" >
                        </div>

                

                        <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>
                    
                    </form>
                </div>
                <div class="col-md-4 card">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th scope="col" class="col-8">Usuário</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- listando todos usuario -->
                            <?php
                                $query = "SELECT * FROM tusuario";
                                $dados = mysqli_query($con, $query);

                                while($linha = mysqli_fetch_assoc($dados)){
                            ?>

                                <tr>
                                    <td> <?php echo $linha['nomeUsuario']; ?> </td>
                                    <td> <a href=""> Editar </a> </td>
                                    <td> <a href=""> Excluir </a></td>
                                </tr>
                                
                            <?php  } ?>
                           
                        
                        </tbody>
                    </table>
                </div>
          

                </div>


            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>