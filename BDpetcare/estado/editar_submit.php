<?php 

include('../config/conecta.php');


$id_estado=$_POST['id_estado'];
$nome=$_POST['nome'];
$uf=$_POST['uf'];
$regiao_id=$_POST['regiao_id'];


$sql=$conn->prepare("UPDATE tb_estado SET nome= :nome, uf= :uf, regiao_id= :regiao_id WHERE id_estado= :id_estado");
$sql->bindParam(':nome',$nome);
$sql->bindParam(':uf',$uf);
$sql->bindParam(':regiao_id',$regiao_id);
$sql->bindParam(':id_estado',$id_estado);
$sql->execute();
header('location:estado.php');


?>