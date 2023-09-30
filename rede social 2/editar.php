<!DOCTYPE html>
<html>
<head>
    <title>Editar Mensagem</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="painel">
        <h1>Editar Mensagem</h1>

        <?php
        session_start();
        include "banco.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensagem_id']) && isset($_POST['mensagem'])) {
            $mensagem_id = $_POST['mensagem_id'];
            $mensagem = $conn->real_escape_string($_POST['mensagem']);

            // Atualize a mensagem no banco de dados
            $sql = "UPDATE tabela_mensagens SET mensagem = '$mensagem' WHERE id = $mensagem_id";
            if ($conn->query($sql) === TRUE) {
                // Redirecione de volta para a página do chat após a atualização
                header("Location: chat.php");
                exit();
            } else {
                echo "Erro ao atualizar mensagem: " . $conn->error;
            }
        } else {
            if (isset($_GET['id'])) {
                $mensagem_id = $_GET['id'];
                $sql = "SELECT mensagem FROM tabela_mensagens WHERE id = $mensagem_id";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $mensagem_existente = $row['mensagem'];
                } else {
                    echo "Mensagem não encontrada.";
                    exit();
                }
            } else {
                echo "ID da mensagem não especificado.";
                exit();
            }
        }
        ?>

        <form method="post" action="">
            <input type="hidden" name="mensagem_id" value="<?php echo $mensagem_id; ?>">
            <textarea class="entradaMensagem" name="mensagem" required><?php echo $mensagem_existente; ?></textarea>
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>