<?php 

include('../config/conecta.php');
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$sql=$conn -> prepare("DELETE FROM tb_natureza WHERE id_natureza=:id_natureza");
$sql->bindParam(':id_natureza', $id);
$sql->execute();
header('location:natureza.php');
}
?>