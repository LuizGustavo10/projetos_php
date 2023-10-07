<?php
       $nomeServidor = "localhost";//localhost sql105.infinityfree.com
       $username = "root";//root if0_34743313
       $senha = "";//vazio Jo7R8JpGytGuo2A
       $nomeBanco = "banco_chat";//chat_messages if0_34743313_

       $conn = new mysqli($nomeServidor, $username, $senha, $nomeBanco);

       if ($conn->connect_error) {
           die("Conexão com o banco de dados falhou: " . $conn->connect_error);
       }
       
    //    CREATE TABLE tabela_mensagens (
    //      id INT AUTO_INCREMENT PRIMARY KEY,
    //      usuario VARCHAR(255) NOT NULL,
    //      mensagem TEXT NOT NULL,
    //      data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    //  );
?>