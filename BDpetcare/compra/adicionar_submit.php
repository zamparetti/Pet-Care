<?php
$data_compra=$_POST['data_compra'];
$fornecedor_id=$_POST['fornecedor_id'];
include('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_compra (data_compra,fornecedor_id) 
VALUES (:data_compra,:fornecedor_id)"); 
$sql->bindParam(':data_compra',$data_compra);
$sql->bindParam(':fornecedor_id',$fornecedor_id);
$sql->execute();
header('location:compra.php')
?>