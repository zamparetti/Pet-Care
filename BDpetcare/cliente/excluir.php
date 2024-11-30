<?php 

include('../config/conecta.php');
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$sql=$conn -> prepare("DELETE FROM tb_cliente WHERE id_cliente=:id_cliente");
$sql->bindParam(':id_cliente', $id);
$sql->execute();
header('location:cliente.php');
}
?>