<?php
include('../config/conecta.php');
$id_compra=$_POST['id_compra'];
$data_compra=$_POST['data_compra'];
$fornecedor_id=$_POST['fornecedor_id'];

$sql=$conn->prepare("UPDATE tb_compra set data_compra=:data_compra, fornecedor_id= :fornecedor_id
WHERE id_compra= :id_compra");

$sql->bindParam(':data_compra',$data_compra);
$sql->bindParam(':fornecedor_id',$fornecedor_id);
$sql->bindParam(':id_compra',$id_compra);
$sql->execute();
header('location:compra.php');
?>