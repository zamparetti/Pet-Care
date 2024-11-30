<?php 

include('../config/conecta.php');
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$sql=$conn -> prepare("DELETE FROM tb_usuario WHERE id_usuario=:id_usuario");
$sql->bindParam(':id_usuario', $id);
$sql->execute();
header('location:usuario.php');
}
?>