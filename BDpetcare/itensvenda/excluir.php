<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_itensvenda WHERE id_itemvenda= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:itensvenda.php');
?>