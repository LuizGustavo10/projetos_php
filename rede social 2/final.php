<!DOCTYPE html>
<html>
<head>
    <title>Chat em PHP com MySQL</title>
    <style>
        #chat-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Chat em PHP com MySQL</h1>
    <div id="chat-box">
        <?php
        session_start();

        $servername = "sql105.infinityfree.com";//localhost
        $username = "if0_34743313";//root
        $password = "Jo7R8JpGytGuo2A";//vazio
        $dbname = "if0_34743313_";//chat_messages

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
            $message = $conn->real_escape_string($_POST['message']);
            $user = $_SESSION['username'] ?? 'Anônimo';

            $sql = "INSERT INTO chat_messages (user, message) VALUES ('$user', '$message')";
            if ($conn->query($sql) !== TRUE) {
                echo "Erro ao inserir mensagem: " . $conn->error;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
            $_SESSION['username'] = $_POST['username'];
        }

        $sql = "SELECT user, message FROM chat_messages";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>{$row['user']}:</strong> {$row['message']}</p>";
            }
        } else {
            echo "<p>Nenhuma mensagem encontrada.</p>";
        }

        $conn->close();
        ?>
    </div>
    
    <form method="post" action="">
        <input type="text" name="message" placeholder="Digite sua mensagem" required>
        <button type="submit">Enviar</button>
    </form>
    
    <form method="post" action="">
        <label for="username">Escolha um nome de usuário:</label>
        <input type="text" name="username">
        <button type="submit">Atualizar Nome</button>
    </form>
</body>
</html>