<?php
$cliente_id=$_POST['cliente_id'];
$dt_emissao=$_POST['dt_emissao'];
$nro_doc=$_POST['nro_doc'];
$nro_parcelas=$_POST['nro_parcelas'];
$vl_tot_receber=$_POST['vl_tot_receber'];
include('../config/conecta.php');
$conn=new PDO("mysql:host=localhost;dbname=petcare;charset=utf8","root","");
$sql=$conn->prepare("INSERT INTO tb_receber (cliente_id, dt_emissao, nro_doc, nro_parcelas, vl_tot_receber) 
VALUES (:cliente_id,:dt_emissao,:nro_doc,:nro_parcelas,:vl_tot_receber)"); 
$sql->bindParam(':cliente_id',$cliente_id);
$sql->bindParam(':dt_emissao',$dt_emissao);
$sql->bindParam(':nro_doc',$nro_doc);
$sql->bindParam(':nro_parcelas',$nro_parcelas);
$sql->bindParam(':vl_tot_receber',$vl_tot_receber);
$sql->execute();
header('location:receber.php')
?>







SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO
SÓ FALTA ISSO