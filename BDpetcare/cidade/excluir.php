<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_cidade WHERE id_cidade= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:cidade.php');
?>