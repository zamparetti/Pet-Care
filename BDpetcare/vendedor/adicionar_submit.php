<?php
$nm_vendedor = $_POST['nm_vendedor'];
$perc_comissao = $_POST['perc_comissao'];

include('../config/conecta.php');
$sql = $conn->prepare("INSERT INTO tb_vendedor (nm_vendedor, perc_comissao) VALUES (:nm_vendedor, :perc_comissao)");
$sql->bindValue(':nm_vendedor', $nm_vendedor);
$sql->bindValue(':perc_comissao', $perc_comissao);
$sql->execute();

header('location:vendedor.php');
?>
