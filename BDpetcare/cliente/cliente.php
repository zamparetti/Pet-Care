<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tb_cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<?php

include('../config/conecta.php');

$stmt = $conn -> prepare("SELECT c.*, cid.* FROM tb_cliente c LEFT JOIN tb_cidade cid ON cid.id_cidade=c.cidade_id LIMIT 30");
$stmt -> execute();
$result=$stmt->fetchAll();

?>

<form action="" method="post">
    <input type="text" name="busca" id="" placeholder="Buscar Cliente">
    <input type="submit" value="Buscar">
</form>

<?php
if (!empty($_POST['busca'])) {
$sql=$conn->prepare("SELECT c.*,cid.* FROM tb_cliente c LEFT JOIN tb_cidade cid ON cid.id_cidade=c.cidade_id WHERE nm_cliente LIKE :buscar OR c.cpf_cliente LIKE :buscar OR end_rua LIKE :buscar OR end_nro LIKE :buscar OR nm_cidade LIKE :buscar");
$buscar="%".$_POST['busca']."%";
$sql->bindParam(":buscar",$buscar);
$sql->execute();
$result=$sql->fetchAll();
}
?>

<a href="adiciona.php"><img src="../img/adicionar.png" height="50" width="50"></a>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Rua</th>
            <th>Número Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($result as $linha) {
                echo "<tr>";  
                echo "<td>".$linha['id_cliente'] ." </td>"; 
                echo "<td>".$linha['nm_cliente'] ." </td>";
                echo "<td>".$linha['cpf_cliente'] ." </td>";
                echo "<td>".$linha['end_rua'] ." </td>"; 
                echo "<td>".$linha['end_nro'] ." </td>"; 
                echo "<td>".$linha['end_bairro'] ." </td>";
                echo "<td>".$linha['nm_cidade'] ." </td>";  
                

                ?>
  <td> <a href="editar.php?id=<?php echo $linha['id_cliente']?>"><img src="../img/editar.png" height="25" width="25"></a> </td>
  <td> <a href="excluir.php?id=<?php echo $linha['id_cliente']?>"><img src="../img/excluir.png" height="25" width="25" onclick='return confirm("Deseja Realmente Excluir?")'></a></td>
                
                <?php
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
