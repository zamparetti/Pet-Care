<?php
include ('../config/conecta.php');
$id_grupo=$_POST['id_grupo'];
$nm_grupo=$_POST['nm_grupo'];

$sql=$conn->prepare("UPDATE tb_grupo SET nm_grupo= :nm_grupo 
WHERE id_grupo= :id_grupo");
$sql->bindParam(':nm_grupo',$nm_grupo);
$sql->bindParam(':id_grupo', $id_grupo);
$sql->execute();
header('location:grupo.php');


?>