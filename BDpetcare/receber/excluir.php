<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_receber WHERE id_receber= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:receber.php');
?>