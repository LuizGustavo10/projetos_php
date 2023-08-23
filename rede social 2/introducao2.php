<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Médias</title>
</head>
<body>
    <h1>Calculadora de Médias</h1>
    <form method="post" action="">
        Notas do Aluno 1: <input type="number" name="notas_aluno1[]" step="0.01"><br>
        Notas do Aluno 2: <input type="number" name="notas_aluno2[]" step="0.01"><br>
        Notas do Aluno 3: <input type="number" name="notas_aluno3[]" step="0.01"><br>
        <input type="submit" value="Calcular Médias">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function calcularMedia($notas) {
            $soma = array_sum($notas);
            $quantidade = count($notas);
            
            if ($quantidade > 0) {
                return $soma / $quantidade;
            } else {
                return 0;
            }
        }
        
        $notas_aluno1 = $_POST["notas_aluno1"];
        $notas_aluno2 = $_POST["notas_aluno2"];
        $notas_aluno3 = $_POST["notas_aluno3"];
        
        $media_aluno1 = calcularMedia($notas_aluno1);
        $media_aluno2 = calcularMedia($notas_aluno2);
        $media_aluno3 = calcularMedia($notas_aluno3);
        
        echo "<h2>Médias Calculadas:</h2>";
        echo "Média do Aluno 1: " . $media_aluno1 . "<br>";
        echo "Média do Aluno 2: " . $media_aluno2 . "<br>";
        echo "Média do Aluno 3: " . $media_aluno3 . "<br>";
    }
    ?>
</body>
</html>




