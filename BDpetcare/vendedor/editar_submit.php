<?php 

include('../config/conecta.php');

$nm_vendedor=$_POST['nm_vendedor'];
$perc_comissao=$_POST['perc_comissao'];
$id=$_POST['id_vendedor'];

$sql=$conn->prepare("UPDATE tb_vendedor SET nm_vendedor = :nm_vendedor, perc_comissao = :perc_comissao WHERE id_vendedor=:id");
$sql->bindParam(':nm_vendedor',$nm_vendedor);
$sql->bindParam(':perc_comissao',$perc_comissao);
$sql->bindValue(':id',$id);
$sql->execute();
header('location:vendedor.php');
?>