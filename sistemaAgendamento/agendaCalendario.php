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


                    <div class="opcoes-visualizacao">
                    <label for="visualizacao">Escolha a visualização:</label>
                    <select id="visualizacao" class="form-control">
                        <option value="dayGridMonth">Mês</option>
                        <option value="timeGridWeek">Semana</option>
                        <option value="timeGridDay">Dia</option>
                    </select>
                </div>

        <?php
            // Recupere os eventos da tabela 'agendamentos'
            $eventos = array();
           

            if ($con->connect_error) {
                die("Falha na conexão com o banco de dados: " . $con->connect_error);
            }

            $sql = "SELECT agenda.id AS id, funcionario.nome AS funcionario, data, hora_inicio, hora_fim FROM agenda
            INNER JOIN funcionario
            ON funcionario.id = agenda.funcionario";

            $resultado = $con->query($sql);


            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {

                    $eventos[] = array(
                        'id' => $linha['id'],
                        'title' => $linha['funcionario'],
                        'start' => $linha['data'] . 'T' . $linha['hora_inicio'],
                        'end' => $linha['data'] . 'T' . $linha['hora_fim'] ,
                    );
                
                }
            }else {
                echo "<p>Nenhuma mensagem encontrada!</p>";
            }

            $con->close();
        ?>

                <div id='calendar' style="max-height:600px"></div>





            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.min.js" integrity="sha512-xCMh+IX6X2jqIgak2DBvsP6DNPne/t52lMbAUJSjr3+trFn14zlaryZlBcXbHKw8SbrpS0n3zlqSVmZPITRDSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.9/index.global.js" integrity="sha512-lU5sd0e7f59Jia30P5oEI5zC3BzVJ4ao+xRA70IIJ2UBzek4PCkPk+MTLIYwXTXGErOqjJ/rLdB3gLK0E5hD0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?php echo json_encode($eventos); ?>,
            eventClick: function(info) {
                if (confirm("Você deseja excluir esta mensagem?")) {
                    $.post("seuscript.php", { excluir: true, mensagem_id: info.event.id }, function(data) {
                        location.reload();
                    });
                }
            },
            timeZone: 'local', // Configurar para o fuso horário local
        });
            calendar.render();

            // Selecionar visualização
            var visualizacaoSelect = document.getElementById('visualizacao');
            visualizacaoSelect.addEventListener('change', function() {
                calendar.changeView(visualizacaoSelect.value);
            });
        });
    </script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="css/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>