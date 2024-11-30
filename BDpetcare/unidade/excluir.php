<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_unidade WHERE id_unidade= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:unidade.php');
?>

