<?php
$qtd_itensvenda=$_POST['qtd_itensvenda'];
$venda_id=$_POST['venda_id'];
$produto_id=$_POST['produto_id'];
include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_itensvenda (qtd_itensvenda, venda_id, produto_id) 
VALUES (:qtd_itensvenda, :venda_id, :produto_id)");
$sql->bindParam(':qtd_itensvenda',$qtd_itensvenda);
$sql->bindParam(':venda_id',$venda_id);
$sql->bindParam(':produto_id',$produto_id);
$sql->execute();
header('location:itensvenda.php');



?>

