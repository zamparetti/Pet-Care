

                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('../config/conecta.php');

$sql=$conn->prepare("SELECT p.*,u.*,g.* FROM tb_produto p LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id LEFT JOIN tb_grupo g on g.id_grupo= p.grupo_id where p.id_produto ORDER BY sequencia ASC
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
    $sql=$conn->prepare("SELECT p.*,u.*,g.* FROM tb_produto p LEFT JOIN tb_unidade u ON u.id_unidade=p.unidade_id LEFT JOIN tb_grupo g on g.id_grupo= p.grupo_id WHERE p.nm_produto
    LIKE :buscar OR u.nm_unidade LIKE :buscar OR u.sigla_unidade LIKE :buscar OR g.nm_grupo LIKE :buscar OR p.sequencia LIKE :buscar OR p.preco_venda LIKE :buscar OR p.preco_compra LIKE :buscar");
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
                <th> Nome </th>
                <th> Grupo</th>
                <th> Unidade</th>
                <th> Preço Venda</th>
                <th> Preço Compra </th>
                <th> Quantidade Estoque </th>
                <th> Foto Produto</th>
                <th> Sequencia</th>
                <th colspan="3">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach($result as $linha) {
            echo "<tr>";
            echo "<td>".$linha['id_produto']. "</td>";
            echo "<td>".$linha['nm_produto']. "</td>";
            echo "<td>".$linha['nm_grupo']. "</td>";
            echo "<td>".$linha['nm_unidade']. "</td>";
            echo "<td>".$linha['preco_venda']. "</td>";
            echo "<td>".$linha['preco_compra']. "</td>";
            echo "<td>".$linha['qtd_estoque']. "</td>";
            echo "<td>".$linha['nm_foto']. "</td>";
            echo "<td>".$linha['sequencia']. "</td>";
            
            ?>
        <td> <a href="editar.php?id=<?php echo $linha['id_produto']?>">Editar</a></td>
        <td> <a href="excluir.php?id=<?php echo $linha['id_produto']?>">Excluir</a></td>
            <?php
           echo " </tr>";

           }
            ?>
                
        </tbody>
    </table>
</body>
</html>