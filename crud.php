<!-- //conexão= tipoDeBanco nomeBanco Login SenhaVazia -->
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=bancophp','root','');
    //para dar saida de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PHP Data Object) é uma extensão da linguagem PHP para acesso a banco de dados. Totalmente orientado a objetos ele possui diversos recursos importantes, além de suporte a diversos mecanismos de banco de dados.

    //Insert. isset verifica se ta nulo
    if (isset($_POST['nome'])) { //nome ta nulo ?
        $sql = $pdo->prepare("INSERT INTO clientes VALUES ('',?,?)"); //pdo insere valores
        $sql->execute(array($_POST['nome'],$_POST['email'])); //executa inserção a partir do nome e email
        echo 'Inserido com Sucesso!';
    }
    
    //delete
    if(isset($_GET['delete'])){
        $id = (int)$_GET['delete']; //pega o id do delete
        $pdo->exec("DELETE FROM clientes WHERE id=$id");  // -> para referenciar uma instancia de um determinado objeto
        echo 'deletado com sucesso o id'.$id;
    }
    //comando para atualizar, ta manual
    // $nome = 'Felipe';
    // $pdo->exec("update clientes set nome=$nome where id=10");

?>

<form method="post">
    <input type="text" name="nome">
    <input type="text" name="email">
    <input type="submit" name="Enviar">
</form>


<?php
    $sql = $pdo->prepare('SELECT * FROM clientes');
    $sql->execute();

    $fetchClientes = $sql->fetchAll(); 

    foreach($fetchClientes as $key => $value){
        echo '<a href="?delete='.$value['id'].'">
            <img width="20px" src="https://cdn-icons-png.flaticon.com/512/786/786397.png")>
        </a>
        '.$value['nome'].' | '.$value['email'];

        echo '<hr>';
    }

?>