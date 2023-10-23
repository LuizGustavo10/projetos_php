<!DOCTYPE html>
<html>

<head>
    <title>Chat em PHP com MySQL</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
     session_start(); 

            include "banco.php";

            //Se for posst e se não tiver vazio
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])) {
                $_SESSION['usuario'] = $_POST['usuario'];
            }


            //Se for posst e se não tiver vazio
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensagem'])) {

                $mensagem = $conn->real_escape_string($_POST['mensagem']);
                $usuario = $_SESSION['usuario'] ? $_SESSION['usuario']:  'Anônimo';

                $sql = "INSERT INTO tabela_mensagens (usuario, mensagem) VALUES ('$usuario', '$mensagem')";

                if ($conn->query($sql) !== TRUE) {
                    echo "Erro ao inserir mensagem: " . $conn->error;
                }
            }


            // Se for POST e não estiver vazio, exclusão da mensagem
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir']) && isset($_POST['mensagem_id'])) {
                $mensagem_id = $_POST['mensagem_id'];
                $sql = "DELETE FROM tabela_mensagens WHERE id = $mensagem_id";

                if ($conn->query($sql) === TRUE) {
                    // Redirecione de volta para a página do chat após a exclusão
                    header("Location: principal.php");
                    exit();
                } else {
                    echo "Erro ao excluir mensagem: " . $conn->error;
                }
            }


            // Se for GET e tiver um parâmetro "editar" na URL, carregue a mensagem para edição
            if (isset($_GET['editar'])) {
                $mensagem_id = $_GET['editar'];

                // $sql = "SELECT mensagem FROM tabela_mensagens WHERE id = $mensagem_id";
                $sql = "UPDATE tabela_mensagens SET mensagem = 'Churusmingos' WHERE id = $mensagem_id";

                // $result = $conn->query($sql);
                // if ($result->num_rows == 1) {
                //     $row = $result->fetch_assoc();
                //     $mensagem_existente = $row['mensagem'];
                //     header("Location: principal.php");
                //  } else {
                //      echo "Mensagem não encontrada.";
                //      exit();
                //  }
            }



    ?>
    <canvas id="canvas"> </canvas>
    <div class="painel">
        <h1> Senac Connect - Projeto Chat em PHP com MySQL</h1>

        <div class="chat">
            <?php

            $sql = "SELECT usuario, mensagem, id FROM tabela_mensagens";
            $resultado = $conn->query($sql);


            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo '<div class="mensagens">';
                    echo "<p><strong>{$linha['usuario']}:</strong> {$linha['mensagem']}</p>";

                    // Adicione um formulário para ação de exclusão da mensagem
                    echo '<form method="post" action="">';
                    echo "<input type='hidden' name='mensagem_id' value='{$linha['id']}' />";
                    echo "<button type='submit' name='excluir'>Excluir</button>";
                    echo '</form>';

                    echo '</div>';
                }
            } else {
                echo "<p>Nenhuma mensagem encontrada.</p>";
            }

            $conn->close();
            ?>
        </div>

        <form method="post" action="">
            <input class="entradaMensagem" type="text" name="mensagem" placeholder="Digite sua mensagem" required>
            <button type="submit">Enviar Mensagem</button>
        </form>

        <form method="post" action="">

            <input type="text" name="usuario" placeholder="Escolha um nome de usuário">
            <button type="submit">Atualizar Nome</button>
        </form>





    </div>



    <script src="efeito.js"></script>
</body>

</html>