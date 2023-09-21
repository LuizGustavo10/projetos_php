<!DOCTYPE html>
<html>
<head>
    <title>Sistema de RH</title>
</head>
<body>
    <h1>Funcionários</h1>
    <a href="adicionar.php">Adicionar Funcionário</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>
        <?php
        // Conexão com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "", "rh");
        // Verificação de erro na conexão
        if (!$conexao) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
        }

        // Consulta para recuperar os funcionários
        $sql = "SELECT * FROM funcionarios";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["cargo"] . "</td>";
                echo "<td>" . $linha["salario"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum funcionário cadastrado.</td></tr>";
        }

        // Fechando a conexão com o banco de dados
        mysqli_close($conexao);
        ?>
    </table>
</body>
</html>