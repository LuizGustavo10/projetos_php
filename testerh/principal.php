<?php
session_start();
include 'conexao.php';


$destino = "inserirUsuario.php";
$tituloFormulario = "Incluir Usuário";

//Senão tiver autenticado manda pro login
if (!isset($_SESSION['codigoUsuario']) and !isset($_SESSION['senhaUsuario'])) {
    session_destroy();
    unset($_SESSION['codigoUsuario']);
    unset($_SESSION['senhaUsuario']);

    header('location:index.php');
}

if (!empty($_GET['codigoAltUsuario'])) {
    $id = $_GET['codigoAltUsuario'];
    $query = "SELECT * FROM tusuario WHERE codigoUsuario=" . $id;
    $dados = mysqli_query($con, $query);
    $usuario = mysqli_fetch_assoc($dados);

    $destino = "alterarUsuario.php";
    $tituloformulario = "Alterar Usuario";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <i class="fa-brands fa-phoenix-squadron" style="color: #ff8800; font-size: 40px; margin-right: 7px;"></i>
        <a class="navbar-brand" href="#">Sistema RH</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(Página atual)</span></a>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          opções
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="principal.php">Principal</a>
          <a class="dropdown-item" href="funcao.php">Função</a>
          <a class="dropdown-item" href="funcionario.php">Funcionário</a>
          <a class="dropdown-item" href="sair.php">Sair</a>
         
        </div>
      </li>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 menu">
  

               
                    <ul  class="menu">
                        <li><a href="principal.php" class="menu-item"> <i class="fa-solid fa-user-tie"></i> Usuários </a></li>
                        <li><a href="funcao.php" class="menu-item"><i class="fa-solid fa-briefcase"></i> Funções</a></li>
                        <li><a href="funcionario.php" class="menu-item"> <i class="fa-solid fa-people-group"></i> Funcionários</a></li>
                        <li><a href="sair.php" class="menu-item"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                    </ul>
              
            </div>
            <div class="col-md-9">


                <div class="row">
                    <div class="col-md-4 card">
                        <form action="<?= $destino; ?>" method="POST">
                            <h1> Bem Vindo <?php echo $_SESSION['usuarioLogado']; ?> 😁</h1>

                            <div class="form-group">
                                <label for="codigoUsuario">Matriculo - codUsuario</label>
                                <input name="codigoUsuario" type="text" class="form-control" id="codigoUsuario" value="<?php echo isset($usuario) ? $usuario['codigoUsuario'] : "" ?>">
                            </div>


                            <div class="form-group">
                                <label for="nomeUsuario">Nome Usuário</label>
                                <input name="nomeUsuario" type="text" class="form-control" id="nomeUsuario" value="<?php echo isset($usuario) ? $usuario['nomeUsuario'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label for="senhaUsuario">Senha Usuário</label>
                                <input name="senhaUsuario" type="password" class="form-control" id="senhaUsuario" value="<?php echo isset($usuario) ? $usuario['senhaUsuario'] : "" ?>">
                            </div>



                            <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>

                        </form>
                    </div>
                    <div class="col-md-5 card">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-8">Usuário</th>
                                    <th scope="col" class="col-8">Matrícula</th>
                                    <th scope="col">Alterar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- listando todos usuario -->
                                <?php
                                $query = "SELECT * FROM tusuario";
                                $dados = mysqli_query($con, $query);

                                while ($linha = mysqli_fetch_assoc($dados)) {
                                ?>

                                    <tr>
                                        <td> <?php echo $linha['nomeUsuario']; ?> </td>
                                        <td> <?php echo $linha['codigoUsuario']; ?> </td>
                                        <td> <a href="principal.php?codigoAltUsuario=<?= $linha['codigoUsuario']; ?>"> <i class="fa-solid fa-pen-to-square"></i> </a> </td>
                                        <td> <a href="<?php echo "excluirUsuario.php?codigoUsuario=" . $linha['codigoUsuario']; ?>"> <i class="fa-solid fa-trash"></i> </a></td>
                                    </tr>

                                <?php  } ?>


                            </tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="css/script.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>