<!DOCTYPE html>
<html>
<head>
    <title>Minha Rede Social - Ver Postagens</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="painel">
        <div class="cabecalho">
            <h1>Minha Rede Social</h1>
        </div>
        <div class="conteudo">
            <h2>Postagens</h2>
            
            <?php
            // Obtém o nome do usuário a partir do cookie (se existir)
            $nomeUsuario = isset($_COOKIE["nome_usuario"]) ? $_COOKIE["nome_usuario"] : "Anônimo";
            
            session_start();
            
            if (isset($_SESSION["postagens"]) && count($_SESSION["postagens"]) > 0) {
                foreach ($_SESSION["postagens"] as $postagem) {
                    echo '<div class="card">';
                    echo "<strong>$nomeUsuario:</strong><br>";
                    echo "$postagem";
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhuma postagem encontrada.</p>";
            }
            ?>
        </div>
        <div class="menu-lateral">
            <a href="index.html">Fazer Nova Postagem</a>
        </div>
    </div>
</body>
</html>