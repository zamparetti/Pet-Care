
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
    $sql=$conn->prepare("SELECT e.*,r.* FROM tb_estado e LEFT JOIN tb_regiao r ON r.id_regiao=e.regiao_id LIMIT 30");
    $sql-> execute();
    $result=$sql->fetchAll();
    ?>

<body>

<form action="" method="post">
    <input type="text" name="busca" id="busca" placeholder="Nome ou UF">
    <input type="submit" value="Filtrar">
</form> 
<br>

<?php 
if(!empty( $_POST['busca'])){
    $buscar="%".$_POST['busca']. "%";
    $sql=$conn->prepare("SELECT e.*,r.* FROM tb_estado e LEFT JOIN tb_regiao r ON r.id_regiao=e.regiao_id WHERE nome
    LIKE :buscar OR uf LIKE :buscar OR r.nm_regiao LIKE :buscar");
    $sql->bindParam(':buscar',$buscar);
    $sql->execute();
    $result=$sql->fetchAll();
}

?>


    <a href="adicionar.php">Novo</a>
    <table class="table" border="1">
        <thead>
                <tr>
                <th> ID </th>
                <th> Nome </th>
                <th> UF </th>
                <th> Região </th>
                <th colspan="3">Açoes</th>
                </tr>
        </thead> 
        <tbody>
            <?php
            foreach($result as $linha) {
                echo "<tr>";
                echo "<td>".$linha['id_estado']. "</td>";
                echo "<td>".$linha['nome']. "</td>";
                echo "<td>".$linha['uf']. "</td>";
                echo "<td>".$linha['nm_regiao']. "</td>";
                ?>
                <td> <a href="editar.php?id= <?php echo $linha['id_estado'] ?>"> Editar </a> </td>
                <td> <a href="excluir.php?id= <?php echo $linha['id_estado'] ?>"> Excluir </a> </td>
            <?php
                
               
                echo "</tr>";
            } ?>
        </tbody>


           

</table>


</body>
</html>