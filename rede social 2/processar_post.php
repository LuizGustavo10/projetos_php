<!DOCTYPE html>
<html>
<head>
    <title>Rede Social - Processando Postagem</title>
</head>
<body>
    <h1>Rede Social</h1>
    <h2>Processando Postagem</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $postagem = $_POST["postagem"];
        
        // Armazenar a postagem em uma lista (array)
        session_start();
        if (!isset($_SESSION["postagens"])) {
            $_SESSION["postagens"] = array();
        }
        array_push($_SESSION["postagens"], $postagem);
        
        echo "<p>Postagem realizada com sucesso!</p>";
    }
    ?>
    <a href="ver_postagens.php">Ver Postagens</a>
</body>
</html>