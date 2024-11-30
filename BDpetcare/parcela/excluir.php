<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_parcela WHERE id_parcela= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:parcela.php');
?>