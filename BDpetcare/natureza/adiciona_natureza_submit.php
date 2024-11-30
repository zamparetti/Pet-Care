<?php
$nm_natureza=$_POST['nm_natureza'];

include('../config/conecta.php');
$sql = $conn->prepare("INSERT INTO tb_natureza (nm_natureza) VALUES (?)");
$sql->bindValue(1,$nm_natureza);
$sql->execute();

header('location:natureza.php');

?>