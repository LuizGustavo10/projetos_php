<!DOCTYPE html>
<html>
<head>
    <title>Chat em PHP com MySQL - Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form method="post" action="process_register.php">
        <label for="username">Nome de Usuário:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>