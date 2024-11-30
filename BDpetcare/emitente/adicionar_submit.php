<?php
$nm_emitente=$_POST['nm_emitente'];
$cidade_id=$_POST['cidade_id'];
$cnpj_emitente=$_POST['cnpj_emitente'];
$end_rua=$_POST['end_rua'];
$end_nro=$_POST['end_nro'];
$end_bairro=$_POST['end_bairro'];


include('../config/conecta.php');

$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");

$sql=$conn->prepare("INSERT INTO tb_emitente (nm_emitente, cidade_id, cnpj_emitente, end_rua, end_nro, end_bairro) 
VALUES (:nm_emitente, :cidade_id, :cnpj_emitente, :end_rua, :end_nro, :end_bairro)"); 

$sql->bindParam(':nm_emitente',$nm_emitente);
$sql->bindParam(':cidade_id',$cidade_id);
$sql->bindParam(':cnpj_emitente',$cnpj_emitente);
$sql->bindParam(':end_rua',$end_rua);
$sql->bindParam(':end_nro',$end_nro);
$sql->bindParam(':end_bairro',$end_bairro);
$sql->execute();
header('location:emitente.php')
?>