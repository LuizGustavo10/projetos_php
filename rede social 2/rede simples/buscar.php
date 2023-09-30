<?php
session_start();

if (isset($_GET["busca"])) {
    $termoBusca = $_GET["busca"];
    
    if (isset($_SESSION["postagens"]) && count($_SESSION["postagens"]) > 0) {
        echo "<ul>";
        foreach ($_SESSION["postagens"] as $postagem) {
            if (stripos($postagem, $termoBusca) !== false) {
                echo "<li>$postagem</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhuma postagem encontrada com o termo '$termoBusca'.</p>";
    }
}
?>





