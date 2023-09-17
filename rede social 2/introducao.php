<?php
// Definindo uma função para calcular a média
function calcularMedia($notas) {
    $soma = array_sum($notas);
    $quantidade = count($notas);
    
    if ($quantidade > 0) {
        return $soma / $quantidade;
    } else {
        return 0;
    }
}

// Array de notas dos alunos
$notas_aluno1 = array(9.5, 8.7, 7.8);
$notas_aluno2 = array(6.5, 5.2, 4.9);
$notas_aluno3 = array(); 

// Calculando as médias
$media_aluno1 = calcularMedia($notas_aluno1);
$media_aluno2 = calcularMedia($notas_aluno2);
$media_aluno3 = calcularMedia($notas_aluno3);

// Exibindo os resultados
echo "Média do Aluno 1: " . $media_aluno1 . "<br>";
echo "Média do Aluno 2: " . $media_aluno2 . "<br>";
echo "Média do Aluno 3: " . $media_aluno3 . "<br>";

// Usando uma estrutura condicional
if ($media_aluno1 > $media_aluno2) {
    echo "O Aluno 1 teve a maior média.<br>";
} elseif ($media_aluno2 > $media_aluno1) {
    echo "O Aluno 2 teve a maior média.<br>";
} else {
    echo "Os Alunos 1 e 2 tiveram médias iguais.<br>";
}

// Usando um loop para verificar se um aluno foi aprovado
$alunos = array(
    "Aluno 1" => $media_aluno1,
    "Aluno 2" => $media_aluno2,
    "Aluno 3" => $media_aluno3
);

foreach ($alunos as $aluno => $media) {
    if ($media >= 6) {
        echo "$aluno foi aprovado.<br>";
    } else {
        echo "$aluno foi reprovado.<br>";
    }
}

function calcularMedia($notas) {
    $soma = 0;
    $quantidade = count($notas);
    
    for ($i = 0; $i < $quantidade; $i++) {
        $soma += $notas[$i];
    }
    
    if ($quantidade > 0) {
        return $soma / $quantidade;
    } else {
        return 0;
    }
}
?>



