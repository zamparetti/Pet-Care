<?php 

include('../config/conecta.php');
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$sql=$conn -> prepare("DELETE FROM tb_regiao WHERE id_regiao=:id_regiao");
$sql->bindParam(':id_regiao', $id);
$sql->execute();
header('location:regiao.php');
}
?>