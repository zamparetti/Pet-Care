<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('../config/conecta.php');

// Consulta padrão
$sql = $conn->prepare("SELECT v.*, ve.*, c.*, n.*
                       FROM tb_venda v
                       LEFT JOIN tb_vendedor ve ON ve.id_vendedor = v.vendedor_id
                       LEFT JOIN tb_cliente c ON c.id_cliente = v.cliente_id
                       LEFT JOIN tb_natureza n ON n.id_natureza = v.natureza_id
                       LIMIT 30");
$sql->execute();
$result = $sql->fetchAll();

// Consulta com filtro
if (!empty($_POST['busca'])) {
    $buscar = "%" . $_POST['busca'] . "%";
    $sql = $conn->prepare("SELECT v.*, ve.*, c.*, n.*
                           FROM tb_venda v
                           LEFT JOIN tb_vendedor ve ON ve.id_vendedor = v.vendedor_id
                           LEFT JOIN tb_cliente c ON c.id_cliente = v.cliente_id
                           LEFT JOIN tb_natureza n ON n.id_natureza = v.natureza_id
                           WHERE v.dt_venda LIKE :buscar
                           OR ve.nm_vendedor LIKE :buscar
                           OR ve.perc_comissao LIKE :buscar
                           OR c.nm_cliente LIKE :buscar
                           OR c.cpf_cliente LIKE :buscar
                           OR n.nm_natureza LIKE :buscar");
    $sql->bindParam(':buscar', $buscar);
    $sql->execute();
    $result = $sql->fetchAll();
}
?>

<form action="" method="post">
    <input type="text" name="busca" id="busca" placeholder="Quantidade de itens, preço unitário, produto ou data de compra">
    <input type="submit" value="Filtrar">
</form>

<a href="adicionar.php">Novo</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data da venda</th>
            <th>Nome do vendedor</th>
            <th>Nome do cliente</th>
            <th>Natureza</th>
            <th colspan="3">AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $linha) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['dt_venda'] . "</td>";
            echo "<td>" . $linha['nm_vendedor'] . "</td>";
            echo "<td>" . $linha['nm_cliente'] . "</td>";
            echo "<td>" . $linha['nm_natureza'] . "</td>";
            ?>
            <td><a href="editar.php?id=<?php echo $linha['id']; ?>">Editar</a></td>
            <td><a href="excluir.php?id=<?php echo $linha['id']; ?>">Excluir</a></td>
            <?php
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
