<?php

if (!empty($_GET['id'])) {
$id=$_GET['id'];
include ('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_comprador WHERE id_comprador= :id");
$sql->bindParam(':id',$id);
$sql->execute();
}
header('location:comprador.php');
?>
