<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "rh");

    // Verificação de erro na conexão
    if (!$conexao) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Recuperando os dados do formulário
    $nome = $_POST["nome"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];

    // Inserindo os dados na tabela
    $sql = "INSERT INTO funcionarios (nome, cargo, salario) VALUES ('$nome', '$cargo', '$salario')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "Funcionário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar funcionário: " . mysqli_error($conexao);
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conexao);
}
?>      