

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT i.*,v.*,p.* FROM tb_itensvenda i LEFT JOIN tb_venda v ON v.id=i.venda_id LEFT JOIN tb_produto p on p.id_produto= i.produto_id where i.id_itemvenda
    LIMIT 30");
$sql->execute();

$result=$sql->fetchAll();

?>

<body>
    <form action="" method="post">
        <input type="text" name="busca" id="busca" placeholder="Nome, grupo ou unidade">
        <input type="submit" value="Filtrar">
    </form>
<?php
if(!empty ($_POST['busca'])){
    $buscar="%".$_POST['busca']."%";
    $sql=$conn->prepare("SELECT i.*,v.*,p.* FROM tb_itensvenda i LEFT JOIN tb_venda v ON v.id=i.venda_id LEFT JOIN tb_produto p on p.id_produto= i.produto_id WHERE i.qtd_itensvenda
    LIKE :buscar OR v.dt_venda LIKE :buscar OR p.nm_produto LIKE :buscar");
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
                <th> Data da Venda </th>
                <th> Nome do produto</th>
                <th> Quantidade vendidos</th>
                <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";
            echo "<td>".$linha['id_itemvenda']. "</td>";
            echo "<td>".$linha['dt_venda']. "</td>";
            echo "<td>".$linha['nm_produto']. "</td>";
            echo "<td>".$linha['qtd_itensvenda']. "</td>";
            
            ?>
        <td> <a href="editar.php?id=<?php echo $linha['id_itemvenda']?>">Editar</a></td>
        <td> <a href="excluir.php?id=<?php echo $linha['id_itemvenda']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
                
        </tbody>
    </table>
</body>
</html>