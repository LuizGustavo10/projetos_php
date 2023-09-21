<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Funcionário</title>
</head>
<body>
    <h1>Adicionar Funcionário</h1>
    <form action="processar.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" required><br>
        <label for="salario">Salário:</label>
        <input type="text" name="salario" required><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>