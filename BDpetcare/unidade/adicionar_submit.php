<?php
$nm_unidade=$_POST['nm_unidade'];
$sigla_unidade=$_POST['sigla_unidade'];
include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_unidade (nm_unidade, sigla_unidade) 
VALUES (:nm_unidade, :sigla_unidade)");
$sql->bindParam(':nm_unidade',$nm_unidade);
$sql->bindParam(':sigla_unidade',$sigla_unidade);
$sql->execute();
header('location:unidade.php');



