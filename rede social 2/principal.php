<!DOCTYPE html>
<html>
<head>
    <title>Chat em PHP com MySQL</title>

    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<canvas id="canvas">   </canvas>
<div class="painel">
    <h1> Senac Connect - Projeto Chat em PHP com MySQL</h1>
    
    <div class="chat">
        <?php
        session_start();

        include "banco.php";

        //Se for posst e se não tiver vazio
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensagem'])) {

            $mensagem= $conn->real_escape_string($_POST['mensagem']);
            $usuario = $_SESSION['usuario'] ?? 'Anônimo';

            $sql = "INSERT INTO tabela_mensagens (usuario, mensagem) VALUES ('$usuario', '$mensagem')";
            if ($conn->query($sql) !== TRUE) {
                echo "Erro ao inserir mensagem: " . $conn->error;
            }
        }

         //Se for posst e se não tiver vazio
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])) {
            $_SESSION['usuario'] = $_POST['usuario'];
        }

        $sql = "SELECT usuario, mensagem FROM tabela_mensagens";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mensagens">';
                echo "<p><strong>{$row['usuario']}:</strong> {$row['mensagem']}</p> ";
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