<?php 

include('../config/conecta.php');
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$sql=$conn -> prepare("DELETE FROM tb_vendedor WHERE id_vendedor=:id_vendedor");
$sql->bindParam(':id_vendedor', $id);
$sql->execute();
header('location:vendedor.php');
}
?>