<?php
$nm_grupo=$_POST['nm_grupo'];
include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_grupo (nm_grupo) 
VALUES (:nm_grupo)");
$sql->bindParam(':nm_grupo',$nm_grupo);
$sql->execute();
header('location:grupo.php');



?>