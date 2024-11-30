<?php
$nm_comprador=$_POST['nm_comprador'];
include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_comprador (nm_comprador) 
VALUES (:nm_comprador)");
$sql->bindParam(':nm_comprador',$nm_comprador);
$sql->execute();
header('location:comprador.php');



?>