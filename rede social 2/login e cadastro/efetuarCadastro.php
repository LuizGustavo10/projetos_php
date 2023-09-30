<?php
session_start();

include "banco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro bem-sucedido. Você pode fazer login agora.";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>