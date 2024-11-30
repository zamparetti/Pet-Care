<?php 

include('../config/conecta.php');

$nm_natureza=$_POST['nm_natureza'];
$id=$_POST['id_natureza'];

$sql=$conn->prepare("UPDATE tb_natureza SET nm_natureza = :nm_natureza WHERE id_natureza=:id");
$sql->bindParam(':nm_natureza',$nm_natureza);
$sql->bindValue(':id',$id);
$sql->execute();
header('location:natureza.php');
?>