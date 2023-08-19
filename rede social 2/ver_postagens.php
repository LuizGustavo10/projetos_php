<!DOCTYPE html>
<html>
<head>
    <title>Rede Social - Ver Postagens</title>
</head>
<body>
    <h1>Rede Social</h1>
    <h2>Postagens</h2>
    
    <?php
    session_start();
    
    if (isset($_SESSION["postagens"]) && count($_SESSION["postagens"]) > 0) {
        echo "<ul>";
        foreach ($_SESSION["postagens"] as $postagem) {
            echo "<li>$postagem</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhuma postagem encontrada.</p>";
    }
    ?>
    <a href="index.html">Fazer Nova Postagem</a>
</body>
</html>