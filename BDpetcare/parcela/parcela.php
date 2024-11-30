<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT p.*,r.* FROM tb_parcela p LEFT JOIN tb_receber r ON r.id_receber=p.receber_id LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<body>
    <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Data de emissão, valor da parcela, data de recebimento, data de vencimento, valor da multa, juros, valor recebido, valor total a receber e número de documento">
        <input type="submit" value="Filtrar">
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT p.*,r.* FROM tb_parcela p LEFT JOIN tb_receber r ON r.id_receber=p.receber_id WHERE p.dt_emissao_p
    LIKE :buscar OR p.dt_recto LIKE :buscar OR p.dt_vencto LIKE :buscar OR p.vl_juros LIKE :buscar OR p.vl_multa LIKE :buscar OR p.vl_parcela LIKE :buscar OR p.vl_recebido LIKE :buscar
    OR r.vl_tot_receber LIKE :buscar OR r.nro_doc LIKE :buscar");
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
               <th>Data de emissão</th>
               <th>Data de recebimento</th>
               <th>Data de vencimento</th>
               <th>Valor do Juros</th>
               <th>Valor da multa</th>
               <th>Valor da parcela</th>
               <th>Valor Recebido</th>
               <th>Valor total a Receber</th>
               <th>Número do documento</th>
               
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";

            echo "<td>".$linha['id_parcela']."</td>";
            echo "<td>".$linha['dt_emissao_p']."</td>";
            echo "<td>".$linha['dt_recto']."</td>";
            echo "<td>".$linha['dt_vencto']."</td>";
            echo "<td>".$linha['vl_juros']."</td>";
            echo "<td>".$linha['vl_multa']."</td>";
            echo "<td>".$linha['vl_parcela']."</td>";
            echo "<td>".$linha['vl_recebido']."</td>";
            echo "<td>".$linha['vl_tot_receber']."</td>";
            echo "<td>".$linha['nro_doc']."</td>";
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_parcela']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_parcela']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>