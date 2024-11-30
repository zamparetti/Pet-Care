<?php

if(!empty ($_GET['id'])){
$id=$_GET['id'];
include('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_emitente WHERE id_emitente= :id");
$sql->bindParam(':id', $id);
$sql->execute();
}
header('location:emitente.php');
?>