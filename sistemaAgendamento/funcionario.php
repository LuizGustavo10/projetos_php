<?php
session_start();
include 'conexao.php';
include 'validaAutenticacao.php';


$destino = "./funcionario/inserirFuncionario.php";
$tituloFormulario = "Incluir Funcionário";


if (!empty($_GET['codigoAltFuncionario'])) {
    $id = $_GET['codigoAltFuncionario'];
    $query = "SELECT * FROM funcionario WHERE id=" . $id;
    $dados = mysqli_query($con, $query);
    $funcionario = mysqli_fetch_assoc($dados);

    $destino = "./funcionario/alterarFuncionario.php";
    $tituloformulario = "Alterar Funcionario";

    $oculto = '<input type="hidden" name="codigoFuncionario" value="'.$id.'"/>';
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

  <?php include 'nav.php'; ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 menu">
               
                <?php include 'menu.php' ?>
              
            </div>
            <div class="col-md-9">


                <div class="row">

                    <div class="col-md-5 card">
                        <form action="<?= $destino; ?>" method="POST">
                            <h3>Cadastro de Funcionários</h3>

                            <div class="form-group">
                                <label>ID</label>
                                <input disabled name="id" type="text" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['id'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nome do Funcionário</label>
                                <input name="nome" type="text" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['nome'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label> Nome da profissão </label>
                                <select class="form-control" name="funcao">
                                <option value="">Selecione</option>

                                    <?php
                                        $query = "SELECT * FROM funcoes";
                                        $dados = mysqli_query($con, $query);
                                        echo $funcionario['funcao'];

                                        while($linha = mysqli_fetch_assoc($dados)){
                                            echo "<option value='".$linha['codigo']."' >" .$linha['descricao']. "</option>";
                                        }
                                    ?>

                                </select>

                            </div>


                            <div class="form-group">
                                <label> Salário </label>
                                <input name="salario" type="text" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['salario'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label> Matricula do Funcionario </label>
                                <input name="codigo" type="text" class="form-control" 
                                value="<?php echo isset($funcionario) ? $funcionario['codigo'] : ""; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Data de Nascimento </label>
                                <input name="dataNascimento" type="date" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['dataNascimento'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label>cpf </label>
                                <input name="cpf" type="text" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['cpf'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label>Data de Nascimento </label>
                                <input name="senha" type="text" class="form-control"
                                value="<?php echo isset($funcionario) ? $funcionario['senha'] : ""; ?>">
                            </div>

                            <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>

                    <div class="col-md-5 card">

                        <table class="table table-hover" id="tabela">

                            <thead>
                                <tr>
                                    <th scope="col" class="col-8">Funcionário</th>
                                    <th scope="col">Alterar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- listando todos usuario -->
                                <?php
                                $query = "SELECT * FROM funcionario";
                                $dados = mysqli_query($con, $query);

                                while ($linha = mysqli_fetch_assoc($dados)) {
                                ?>

                                    <tr>
                                        <td> <?php echo $linha['nome']; ?> </td>
                                        <td> <a href="funcionario.php?codigoAltFuncionario=<?= $linha['id']; ?>"> <i class="fa-solid fa-pen-to-square"></i> </a> </td>
                                        <td> <a href="<?php echo "./funcionario/excluirFuncionario.php?id=" . $linha['id']; ?>"> <i class="fa-solid fa-trash"></i> </a></td>
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