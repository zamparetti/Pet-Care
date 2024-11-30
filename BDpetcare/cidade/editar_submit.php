<?php
include('../config/conecta.php');
$id_cidade=$_POST['id_cidade'];
$nm_cidade=$_POST['nm_cidade'];
$estado_id=$_POST['estado_id'];

$sql=$conn->prepare("UPDATE tb_cidade set nm_cidade=:nm_cidade, estado_id= :estado_id
WHERE id_cidade= :id_cidade");

$sql->bindParam(':nm_cidade',$nm_cidade);
$sql->bindParam(':estado_id',$estado_id);
$sql->bindParam(':id_cidade',$id_cidade);
$sql->execute();
header('location:cidade.php');
?>