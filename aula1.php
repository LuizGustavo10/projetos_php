<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancophp";

// Conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Operação CREATE - Inserir dados no banco
if(isset($_POST['create'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')";
    mysqli_query($conn, $sql);
}

// Operação READ - Ler dados do banco
$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);

// Operação UPDATE - Atualizar dados no banco
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE clientes SET nome='$nome', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Operação DELETE - Excluir dados do banco
if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM clientes WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fechar conexão com o banco de dados
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
<!-- Formulário de Inserção -->
<form method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>E-mail:</label>
    <input type="email" name="email" required>
    <input type="submit" name="create" value="Adicionar">
</form>

<!-- Tabela de Dados -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <!-- Formulário de Edição -->
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                        <input type="submit" name="update" value="Editar">
                    </form>

                    <!-- Formulário de Exclusão -->
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="delete" value="Excluir">
                    </form>
                </td>
    <title>Document</title>
</head>
<body>
    
</body>
</html>