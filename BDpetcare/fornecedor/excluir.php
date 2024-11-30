<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_fornecedor WHERE id_fornecedor= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:fornecedor.php');
?>