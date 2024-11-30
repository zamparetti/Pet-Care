<?php

if (!empty($_GET['id'])) {
$id=$_GET['id'];
include ('../config/conecta.php');
$sql=$conn->prepare("DELETE FROM tb_grupo WHERE id_grupo= :id");
$sql->bindParam(':id',$id);
$sql->execute();
}
header('location:grupo.php');
?>
