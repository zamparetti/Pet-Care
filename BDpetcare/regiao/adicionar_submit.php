<?php
$nm_regiao=$_POST['nm_regiao'];

include('../config/conecta.php');
$sql = $conn->prepare("INSERT INTO tb_regiao (nm_regiao) VALUES (?)");
$sql->bindValue(1,$nm_regiao);
$sql->execute();

header('location:regiao.php');

?>