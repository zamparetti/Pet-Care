<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT e.*, c.* FROM tb_emitente e LEFT JOIN tb_cidade c ON c.id_cidade = e.cidade_id LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<body>
    <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Nome emitente ou Cidade">
        <input type="submit" value="Filtrar">
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT e.*,c.* FROM tb_emitente e LEFT JOIN tb_cidade c ON c.id_cidade=e.cidade_id WHERE e.nm_emitente
    LIKE :buscar OR c.nm_cidade LIKE :buscar");
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
               <th>Cidade</th>
               <th>CNPJ</th>
               <th>Rua</th>
               <th>N.º da Casa</th>
               <th>Bairro</th>
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";

            echo "<td>".$linha['id_emitente']."</td>";
            echo "<td>".$linha['nm_emitente']."</td>"; 
            echo "<td>".$linha['nm_cidade']."</td>"; 
            echo "<td>".$linha['cnpj_emitente']."</td>";
            echo "<td>".$linha['end_rua']."</td>";
            echo "<td>".$linha['end_nro']."</td>";
            echo "<td>".$linha['end_bairro']."</td>";
          
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_emitente']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_emitente']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>