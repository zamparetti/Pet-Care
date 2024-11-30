<?php 

include('../config/conecta.php');

$nm_regiao=$_POST['nm_regiao'];
$id=$_POST['id_regiao'];

$sql=$conn->prepare("UPDATE tb_regiao SET nm_regiao = :nm_regiao WHERE id_regiao=:id");
$sql->bindParam(':nm_regiao',$nm_regiao);
$sql->bindValue(':id',$id);
$sql->execute();
header('location:regiao.php');
?>