<?php
//PHP - personal home page
//variáveis
//variável de variável
//concatenar
//comparar valores
//>= <= == !=
// === !==
//Looping
//funções
//classes

$nome = 'Luiz';
$Luiz = 'coach!';
echo 'O meu nome  é ' . $$nome;

if ($nome == 'Luiz') {
    echo 'Verdadeiro';
} else {
    echo 'Falso';
}

//código de verificar idade
$idade = '26';
if ($idade == 26) { //== parecido === identico
    echo 'Verdadeiro';
} else {
    echo 'Falso';
}

//for para imprimir números e linhas
for ($i = 0; $i < 10; $i++) {
    echo $i;
    echo '<hr>';
}

//funções - concatena com ponto
printNumero(30);
echo '<br>';
function printNumero($n) {
    echo 'O número é' . $n;
}

//criando classe
class Pessoa {
    public $nome;
    public $idade;

    //Fazendo Construtor, que recebe os valores por parâmetro
    public function __construct($nome,$idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    //função para imprimir
    public function printNomeEIdade() {
        echo 'Imprimindo da Classe Pessoa:';
        echo $this->nome;
        echo ' ';
        echo $this->idade;
        echo '<br>';
    }
}

//passar para o construtor de pessoa nome é idade
$pessoa = new Pessoa('Guilherme','26');
$pessoa->printNomeEIdade();

$pessoa = new Pessoa('Luiz','22');
$pessoa->printNomeEIdade();


?>