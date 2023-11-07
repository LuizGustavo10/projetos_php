<?php
session_start();
include 'conexao.php';
include 'validaAutenticacao.php';


$destino = "./usuario/inserirUsuario.php";
$tituloFormulario = "Incluir Usuário";


if (!empty($_GET['codigoAltUsuario'])) {
    $id = $_GET['codigoAltUsuario'];
    $query = "SELECT * FROM usuario WHERE id=" . $id;
    $dados = mysqli_query($con, $query);
    $usuario = mysqli_fetch_assoc($dados);

    $destino = "./usuario/alterarUsuario.php";
    $tituloformulario = "Alterar Usuario";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>

    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3 menu animate__animated animate__fadeInLeft">
                <?php include 'menu.php' ?>
            </div>

            <div class="col-md-9">


                <div class="row">
                    <div class="col-md card">
                        <form action="<?= $destino; ?>" method="POST">
                            <h1> Bem Vindo <?php echo $_SESSION['usuarioLogado']; ?> 😁</h1>

                            <div class="form-group">
                                <label>Id </label>
                                <input disabled name="id" type="text" class="form-control" value="<?php echo isset($usuario) ? $usuario['id'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label>Matriculo - codUsuario</label>
                                <input name="codigo" type="text" class="form-control" value="<?php echo isset($usuario) ? $usuario['codigo'] : "" ?>">
                            </div>
 

                            <div class="form-group">
                                <label>Nome Usuário</label>
                                <input name="nome" type="text" class="form-control" value="<?php echo isset($usuario) ? $usuario['nome'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label>CPF</label>
                                <input name="cpf" type="text" class="form-control" value="<?php echo isset($usuario) ? $usuario['cpf'] : "" ?>">
                            </div>

                            <div class="form-group">
                                <label>Senha Usuário</label>
                                <input name="senha" type="password" class="form-control" value="<?php echo isset($usuario) ? $usuario['senha'] : "" ?>">
                            </div>



                            <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>

                        </form>
                    </div>
                    <div class="col-md card">
                        <table class="table table-hover" id="tabela">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-8">Usuário</th>
                                    <th scope="col" class="col-8">Usuário</th>
                                    <th scope="col" class="col-8">Matrícula</th>
                                    <th scope="col">Alterar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- listando todos usuario -->
                                <?php
                                
                                $query = "SELECT * FROM usuario";
                                $dados = mysqli_query($con, $query);

                                while ($linha = mysqli_fetch_assoc($dados)) {
                                ?>

                                    <tr>
                                        <td> <?php echo $linha['id']; ?> </td>
                                        <td> <?php echo $linha['nome']; ?> </td>
                                        <td> <?php echo $linha['codigo']; ?> </td>
                                        <td> <a href="principal.php?codigoAltUsuario=<?= $linha['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> </a> </td>
                                        <td> <a href="<?php echo "./usuario/excluirUsuario.php?id=" . $linha['id']; ?>"> <i class="fa-solid fa-trash"></i> </a></td>
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