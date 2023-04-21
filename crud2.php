<?php
$pdo = new PDO('mysql:host=localhost;dbname=bancophp', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['nome'])) {
    $sql = $pdo->prepare("INSERT INTO clientes VALUES ('',?,?)");
    $sql->execute(array($_POST['nome'], $_POST['email']));
    echo 'Inserido com Sucesso!';
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->exec("DELETE FROM clientes WHERE id=$id");
    echo 'deletado com sucesso o id ' . $id;
}

// $nome = 'Felipe';
// $pdo->exec("update clientes set nome=$nome where id=10");

?>

<form method="post">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <div class="row justify-content-center">
        <div class="col-md-5">
        
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
            <label class="form-label"> </label>

        <div class="text-center">
            <input type="submit" name="Enviar" class="btn btn-primary">
        </div>


            </form>

    <?php
    $sql = $pdo->prepare('SELECT * FROM clientes');
    $sql->execute();

    // A função fetchAll() é útil quando você precisa recuperar 
    // todas as linhas de resultado de uma consulta e processá-las 
    // posteriormente. Por exemplo, se você estiver executando uma 
    // consulta para buscar todos os usuários de um banco de dados, 
    // poderá usar a função fetchAll() para buscar todas as linhas e, 
    // em seguida, percorrer o array de resultados para exibir as 
    // informações desejadas.

    $clientes = $sql->fetchAll(); //buscarTodos

    echo "<table class='table'>";

    echo "<tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>";

    foreach ($clientes as $i => $valor) {
        echo '<td><a href="?delete=' . $valor['id'] . '">Excluir</a></td>';
        echo "<td>" . $valor['nome'] . "</td>";
        echo "<td>" . $valor['email'] . "</td>";
        echo "</tr>";;
    }
    echo "</table>";

    ?>

    </div>
</div>