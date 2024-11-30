<?php
$nome=$_POST['nome'];
$uf=$_POST['uf'];
$regiao_id=$_POST['regiao_id'];
include ('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_estado (nome, uf, regiao_id) VALUES (:nome,:uf,:regiao_id)"); 
$sql->bindParam('nome' ,$nome);
$sql->bindParam('uf' ,$uf);
$sql->bindParam(':regiao_id',$regiao_id);
$sql->execute();

header('location:estado.php');

?>