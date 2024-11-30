<?php
include ('../config/conecta.php');
$id_comprador=$_POST['id_comprador'];
$nm_comprador=$_POST['nm_comprador'];

$sql=$conn->prepare("UPDATE tb_comprador SET nm_comprador= :nm_comprador 
WHERE id_comprador= :id_comprador");
$sql->bindParam(':nm_comprador',$nm_comprador);
$sql->bindParam(':id_comprador', $id_comprador);
$sql->execute();
header('location:comprador.php');


?>