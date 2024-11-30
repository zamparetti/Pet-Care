

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT i.*,c.*,p.* FROM tb_itenscompra i LEFT JOIN tb_compra c ON c.id_compra=i.compra_id LEFT JOIN tb_produto p on p.id_produto= i.produto_id where i.id_itenscompra 
    LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<body>
    <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Quantidade de itens, preço unitário, produto ou data de compra">
        <input type="submit" value="Filtrar">
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT i.*,c.*,p.* FROM tb_itenscompra i LEFT JOIN tb_compra c ON c.id_compra=i.compra_id LEFT JOIN tb_produto p on p.id_produto= i.produto_id where i.id_itenscompra WHERE i.qtd_itenscompra
    LIKE :buscar OR c.data_compra LIKE :buscar OR p.nm_produto LIKE :buscar OR i.pr_unitario LIKE :buscar");
    $sql->bindParam(':buscar',$buscar);
    $sql-> execute();
    $result=$sql->fetchAll();
   
}

?>
    <a href="adicionar.php">Novo</a>
    <table border="1">
        <thead>
            <tr>
                <th> ID </th>
                <th> Quantidade de itens </th>
                <th> Preço unitário</th>
                <th> Nome do produto</th>
                <th> Data da compra</th>
               <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";
            echo "<td>".$linha['id_itenscompra']. "</td>";
            echo "<td>".$linha['qtd_itenscompra']. "</td>";
            echo "<td>".$linha['pr_unitario']. "</td>";
            echo "<td>".$linha['nm_produto']. "</td>";
            echo "<td>".$linha['data_compra']. "</td>"
            
            ?>
            <td> <a href="editar.php?id=<?php echo $linha['id_itenscompra']?>">Editar</a></td>
            <td> <a href="excluir.php?id=<?php echo $linha['id_itenscompra']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
        </tbody>
    </table>
</body>
</html>