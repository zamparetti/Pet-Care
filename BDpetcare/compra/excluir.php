<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_compra WHERE id_compra= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:compra.php');
?>