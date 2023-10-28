<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_inicio = new DateTime($_POST['data_inicio']);
    $data_fim = new DateTime($_POST['data_fim']);
    $dias_semana = $_POST['dias_semana'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];


    // Conecte-se ao banco de dados
    $conexao = new mysqli('localhost', 'root', '', 'age');

    // Verifique a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }
    echo "Nome: $nome<br>";
    echo "Data de Início: " . $data_inicio->format('Y-m-d') . "<br>";
    echo "Data de Término: " . $data_fim->format('Y-m-d') . "<br>";
    echo "Dias da Semana: " . implode(', ', $dias_semana) . "<br>";

    // Insira os dados na tabela para os dias da semana selecionados
    $data_atual = $data_inicio;

    while ($data_atual <= $data_fim) {
        $data = $data_atual->format('Y-m-d');
        //strtotime($data): Esta função do PHP converte a string $data em um timestamp, que é uma representação numérica da data e hora.
        //date('l', ...): A função date() do PHP é usada para formatar um timestamp ou objeto DateTime em uma string de data formatada.
        //strtolower(...): A função strtolower() é usada para converter a string resultante em letras minúsculas.

        
        $dia_semana = strtolower(date('l', strtotime($data))); // Obtém o dia da semana da data
        
       
        //se o dia da semana ta na lista ele lança
        if (in_array($dia_semana, $dias_semana)) {
            
           

            $sql = "INSERT INTO agendamentos (nome, data, hora_inicio, hora_fim) VALUES ('$nome', '$data', '$hora_inicio', '$hora_fim')";

            if ($conexao->query($sql) !== TRUE) {
                echo "Erro ao inserir o agendamento: " . $conexao->error;
                break;
            }
        }
        $data_atual->add(new DateInterval('P1D')); // Avance para o próximo dia
    }

    // Feche a conexão com o banco de dados
    $conexao->close();
    echo "Agendamento(s) criado(s) com sucesso!";
}

?>

?>
