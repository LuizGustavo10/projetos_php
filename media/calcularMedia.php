<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Média</title>
</head>
<body>
    <h1>Resultado da Média</h1>

    <?php
    // Recupere os valores das notas do formulário
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    // Calcula as médias
    $media_aritmetica = ($nota1 + $nota2 + $nota3) / 3;
    $media_ponderada = ($nota1 * 2 + $nota2 * 3 + $nota3 * 5) / (2 + 3 + 5);
    $media_geometrica = pow($nota1 * $nota2 * $nota3, 1/3);

    // Define as faixas de mensagens
    if ($media_aritmetica >= 100) {
        $mensagem = "Perfeito!";
    } elseif ($media_aritmetica >= 90) {
        $mensagem = "Parabéns!";
    } elseif ($media_aritmetica >= 80) {
        $mensagem = "Ótimo!";
    } elseif ($media_aritmetica >= 70) {
        $mensagem = "Bom!";
    } elseif ($media_aritmetica >= 60) {
        $mensagem = "Média";
    } else {
        $mensagem = "Reprovado";
    }

    // Exibe os resultados
    echo "<p>Média Aritmética: $media_aritmetica</p>";
    echo "<p>Média Ponderada: $media_ponderada</p>";
    echo "<p>Média Geométrica: $media_geometrica</p>";
    echo "<p>Situação: $mensagem</p>";
    ?>
</body>
</html>