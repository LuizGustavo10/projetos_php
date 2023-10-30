<?php
session_start();
include 'conexao.php';
include 'validaAutenticacao.php';




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

                    <div class="col-md-11 card">
                        <form method="post" action="./agenda/processa_agendamento.php">
                            <h3>Cadastro de Agenda</h3>

                            <div class="form-group">
                                <label>ID</label>
                                <input name="id" type="text" class="form-control"
                                value="<?php echo isset($agenda) ? $agenda['id'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label> Funcionário </label>
                                <select class="form-control" name="funcionario">
                                <option value="">Selecione</option>

                                    <?php
                                        $query = "SELECT * FROM funcionario";
                                        $dados = mysqli_query($con, $query);
                                        echo $agenda['funcionario'];

                                        while($linha = mysqli_fetch_assoc($dados)){
                                            echo "<option value='".$linha['id']."' >" .$linha['nome']. "</option>";
                                        }
                                    ?>

                                </select>

                            </div>


                            <div class="form-group">
                                <div class="row">
                                        <div class="col">
                                            <label> Data de Inicio </label>
                                            <input name="data_inicio" type="date" class="form-control" 
                                            value="<?php echo isset($agenda) ? $agenda['data_inicio'] : ""; ?>">
                                        </div>
                                        <div class="col">
                                            <label> Data de Fim </label>
                                            <input name="data_fim" type="date" class="form-control"
                                            value="<?php echo isset($agenda) ? $agenda['data_fim'] : ""; ?>">
                                        </div>
                                </div>

                                
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                        <div class="col">
                                            <label> Hora Inicio </label>
                                            <input name="hora_inicio" type="time" class="form-control"
                                            value="<?php echo isset($agenda) ? $agenda['hora_inicio'] : ""; ?>">
                                        </div>
                                        <div class="col">
                                            <label> Hora Fim </label>
                                            <input name="hora_fim" type="time" class="form-control"
                                            value="<?php echo isset($agenda) ? $agenda['hora_fim'] : ""; ?>">
                                        </div>
                                </div>
          
                            </div>

                            <div class="form-group">
                                <label>Dias </label>
                                <label for="dias_semana[]">Dias da Semana:</label><br>
                                <input type="checkbox" name="dias_semana[]" value="sunday" > Domingo --
                                <input type="checkbox" name="dias_semana[]" value="monday"> Segunda-feira --
                                <input type="checkbox" name="dias_semana[]" value="tuesday"> Terça-feira --
                                <input type="checkbox" name="dias_semana[]" value="wednesday"> Quarta-feira --
                                <input type="checkbox" name="dias_semana[]" value="thursday"> Quinta-feira --
                                <input type="checkbox" name="dias_semana[]" value="friday"> Sexta-feira --
                                <input type="checkbox" name="dias_semana[]" value="saturday"> Sábado<br>
                            </div>

                            <div class="form-group">
                                <label>curso </label>
                                <input name="curso" type="text" class="form-control"
                                value="<?php echo isset($agenda) ? $agenda['curso'] : ""; ?>">
                            </div>

                            <div class="form-group">
                                <label>Observação </label>
                                <input name="obs" type="text" class="form-control"
                                value="<?php echo isset($agenda) ? $agenda['obs'] : ""; ?>">
                            </div>

                            <button name="enviar" type="submit" class="btn btn-primary">Enviar</button>
                        </form>
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