<?php
include ('../config/conecta.php');
$id_unidade=$_POST['id_unidade'];
$nm_unidade=$_POST['nm_unidade'];
$sigla_unidade=$_POST['sigla_unidade'];

$sql=$conn->prepare("UPDATE tb_unidade SET nm_unidade= :nm_unidade, sigla_unidade= :sigla_unidade
WHERE id_unidade= :id_unidade");
$sql->bindParam(':nm_unidade',$nm_unidade);
$sql->bindParam(':sigla_unidade',$sigla_unidade);
$sql->bindParam(':id_unidade', $id_unidade);
$sql->execute();
header('location:unidade.php');


?>
