<!DOCTYPE html>
<html>
<head>
    <title>Rede Social - Processando Postagem</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <div class="painel">
        <div class="cabecalho">
            <h1>Rede Social</h1>
        </div>
        <div class="conteudo">
            
            <h2>Processando Postagem</h2>
            
            <?php
            // Obtém o nome do usuário a partir do cookie (se existir)
            $nomeUsuario = isset($_COOKIE["nome_usuario"]) ? $_COOKIE["nome_usuario"] : "Anônimo";
            // Cria um cookie para armazenar o nome do usuário
            setcookie("nome_usuario", $nomeUsuario, time() + (86400 * 30), "/"); // Expira em 30 dias
            
            // Verifica se a requisição foi feita usando POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtém o conteúdo da postagem do campo "postagem"
                $postagem = $_POST["postagem"];
                
                // Armazenar a postagem em uma lista (array)
                session_start(); // Inicia a sessão para usar variáveis de sessão
                if (!isset($_SESSION["postagens"])) { // Se a lista de postagens não existe na sessão
                    $_SESSION["postagens"] = array(); // Cria uma lista vazia
                }
                array_push($_SESSION["postagens"], $postagem); // Adiciona a nova postagem à lista
                
                // Exibe mensagem de confirmação
                echo "<p>Postagem realizada com sucesso!</p>";

            }
            ?>
            <!-- Link para ver as postagens -->
            <a href="ver_postagens.php">Ver Postagens</a>
        </div>
        <div class="menu-lateral">
            <a href="cookie.html">Cadastrar Cookie</a>
            <a href="buscar.html">Busca</a>
        </div>
    </div>
</body>
</html>