
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
    <?php
   include('../config/conecta.php');
    $sql=$conn->prepare("SELECT * FROM tb_forma_pgto LIMIT 30");
    $sql-> execute();
    $result=$sql->fetchAll();
    ?>

<body>

<form action="" method="post">
    <input type="text" name="busca" id="busca" placeholder="Nome da forma de pagamento">
    <input type="submit" value="Filtrar">
</form> 
<br>

<?php 
if(!empty( $_POST['busca'])){
    $buscar="%".$_POST['busca']. "%";
    $sql=$conn->prepare("SELECT * FROM tb_forma_pgto WHERE nm_forma_pgto LIKE :buscar");
    $sql->bindParam(':buscar',$buscar);
    $sql->execute();
    $result=$sql->fetchAll();
}

?>


    <a href="adicionar.php">Novo</a>
    <table border="1">
        <thead>
                <tr>
                <th> ID </th>
                <th> Nome </th>
                <th colspan="3">Açoes</th>
                </tr>
        </thead> 
        <tbody>
            <?php
            foreach($result as $linha) {
                echo "<tr>";
                echo "<td>".$linha['id_forma_pgto']. "</td>";
                echo "<td>".$linha['nm_forma_pgto']. "</td>";
                ?>
                <td> <a href="editar.php?id= <?php echo $linha['id_forma_pgto'] ?>"> Editar </a> </td>
                <td> <a href="excluir.php?id= <?php echo $linha['id_forma_pgto'] ?>"> Excluir </a> </td>
            <?php
                
               
                echo "</tr>";
            } ?>
        </tbody>


           

</table>

</body>
</html>