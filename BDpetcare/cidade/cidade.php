<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT c.*,e.* FROM tb_cidade c LEFT JOIN tb_estado e ON e.id_estado=c.estado_id LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<body>
    <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Nome ou UF">
        <input type="submit" value="Filtrar">
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT c.*,e.* FROM tb_cidade c LEFT JOIN tb_estado e ON e.id_estado=c.estado_id WHERE c.nm_cidade
    LIKE :buscar OR e.uf LIKE :buscar");
    $sql->bindParam(':buscar',$buscar);
    $sql-> execute();
    $result=$sql->fetchAll();
   
}

?>
    <a href="adicionar.php">Novo</a>
    <table border="1">
        <thead>
            <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>UF</th>
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";

            echo "<td>".$linha['id_cidade']."</td>";
            echo "<td>".$linha['nm_cidade']."</td>";
            echo "<td>".$linha['uf']."</td>";
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_cidade']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_cidade']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>