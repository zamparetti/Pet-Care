<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT r.*,c.* FROM tb_receber r LEFT JOIN tb_cliente c ON c.id_cliente=r.cliente_id LIMIT 30");
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
    $sql=$conn->prepare("SELECT r.*,c.* FROM tb_receber r LEFT JOIN tb_cliente c ON c.id_cliente=r.cliente_id WHERE r.dt_emissao
    LIKE :buscar OR r.nro_doc LIKE :buscar OR r.nro_parcelas LIKE :buscar OR r.vl_tot_receber LIKE :buscar OR c.nm_cliente LIKE :buscar");
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
               <th>Nome do cliente</th>
               <th>Data da emissão</th>
               <th>Número do documento</th>
               <th>Número de parcelas</th>
               <th>Valor total a receber</th>
               
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";

            echo "<td>".$linha['id_receber']."</td>";
            echo "<td>".$linha['nm_cliente']."</td>";
            echo "<td>".$linha['dt_emissao']."</td>";
            echo "<td>".$linha['nro_doc']."</td>";
            echo "<td>".$linha['nro_parcelas']."</td>";
            echo "<td>".$linha['vl_tot_receber']."</td>";
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_receber']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_receber']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>