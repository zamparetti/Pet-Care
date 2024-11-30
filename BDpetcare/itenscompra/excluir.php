<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_itenscompra WHERE id_itenscompra= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:itenscompra.php');
?>