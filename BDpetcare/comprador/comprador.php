<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include ('../config/conecta.php');


$sql=$conn->prepare("SELECT * FROM tb_comprador LIMIT 30");
$sql->execute();
 
$result=$sql->fetchAll();

?>
<body>
<form action="" method="post">
 <input type="text" name="busca" id="busca" placeholder="Nome">
 <input type="submit" value="Filtrar">
</form>
<?php
if (!empty($_POST['busca'])) {
$buscar="%".$_POST['busca']."%";
$sql=$conn->prepare("SELECT * FROM tb_comprador WHERE nm_comprador 
LIKE :buscar");
$sql->bindParam(':buscar',$buscar);
$sql->execute();
$result=$sql->fetchAll();
}
?>

  <a href="adicionar.php">Novo</a>

  
    <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th colspan="3">Ações</th>
          </tr>
        </thead>
        <tbody>
    

           <?php 
        foreach($result as $linha) {
        echo "<tr>";
        echo "<td>".$linha['id_comprador']."</td>";
        echo "<td>".$linha['nm_comprador']."</td>";
        ?>
        <td> <a href="editar.php?id=<?php echo $linha['id_comprador']?>">Editar</a>  </td>
        <td> <a href="excluir.php?id=<?php echo $linha['id_comprador']?>" onclick="return confirm('Deseja Excluir?')" >Excluir</a>  </td>
       <?php
       
     
        echo "</tr>";
        }

        ?>
        </tbody>
    </table>
    
</body>
</html>