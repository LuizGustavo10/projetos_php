
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js'></script>
</head>
<body>
<div class="opcoes-visualizacao">
            <label for="visualizacao">Escolha a visualização:</label>
            <select id="visualizacao">
                <option value="dayGridMonth">Mês</option>
                <option value="timeGridWeek">Semana</option>
                <option value="timeGridDay">Dia</option>
            </select>
        </div>

<?php
    // Recupere os eventos da tabela 'agendamentos'
    $eventos = array();
    $conexao = new mysqli('localhost', 'root', '', 'age');

    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    $sql = "SELECT id, nome, data, hora_inicio, hora_fim FROM agendamentos";
    $resultado = $conexao->query($sql);

    echo "$resultado->num_rows";
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {

            $eventos[] = array(
                'id' => $linha['id'],
                'title' => $linha['nome'],
                'start' => $linha['data'] . 'T' . $linha['hora_inicio'],
                'end' => $linha['data'] . 'T' . $linha['hora_fim'] ,
            );
           
        }
    }else {
        echo "<p>Nenhuma mensagem encontrada!</p>";
    }

    $conexao->close();
?>

<div id='calendar'></div>


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
</body>
</html>