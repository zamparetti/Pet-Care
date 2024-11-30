<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
    <?php
    

include('../config/conecta.php');

$sql=$conn->prepare("SELECT c.*,f.* FROM tb_compra c LEFT JOIN tb_fornecedor f ON f.id_fornecedor=c.fornecedor_id LIMIT 30");
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
    $sql=$conn->prepare("SELECT c.*,f.* FROM tb_compra c LEFT JOIN tb_fornecedor f ON f.id_fornecedor=c.fornecedor_id WHERE c.data_compra
    LIKE :buscar");
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
               <th>Data de Compra</th>
               <th>Fornecedor</th>
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";

            echo "<td>".$linha['id_compra']."</td>";
            echo "<td>".$linha['data_compra']."</td>";
            echo "<td>".$linha['nm_fornecedor']."</td>";
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_compra']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_compra']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>