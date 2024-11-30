<?php
$nm_cidade=$_POST['nm_cidade'];
$estado_id=$_POST['estado_id'];
include('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_cidade (nm_cidade,estado_id) 
VALUES (:nm_cidade,:estado_id)"); 
$sql->bindParam(':nm_cidade',$nm_cidade);
$sql->bindParam(':estado_id',$estado_id);
$sql->execute();
header('location:cidade.php')
?>