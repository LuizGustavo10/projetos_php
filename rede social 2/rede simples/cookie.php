<!DOCTYPE html>
<html>
<head>
    <title>Definição de Cookie</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="painel">
        <div class="cabecalho">
            <h1>Definição de Cookie</h1>
        </div>
        <div class="conteudo">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nomeUsuario = $_POST["nomeUsuario"];
                
                // Define o cookie com o nome do usuário
                setcookie("nome_usuario", $nomeUsuario, time() + (86400 * 30), "/"); // Expira em 30 dias
                
                echo "Cookie de nome de usuário definido com sucesso. <br>";
                echo "Nome de usuário: $nomeUsuario";
            } else {
                echo "Erro: Este script só pode ser acessado por meio do formulário.";
            }
            ?>
        </div>
        <div class="menu-lateral">
            <a href="ver_postagens.php">Ver Postagens</a>
        </div>
    </div>
</body>
</html>