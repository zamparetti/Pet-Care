<?php
 
$dt_venda=$_POST['dt_venda'];
$vendedor_id=$_POST['vendedor_id'];
$cliente_id=$_POST['cliente_id'];
$natureza_id=$_POST['natureza_id'];

include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_venda (dt_venda, vendedor_id, cliente_id, natureza_id) 
VALUES (:dt_venda, :vendedor_id, :cliente_id, :natureza_id)");
$sql->bindParam(':dt_venda',$dt_venda);
$sql->bindParam(':vendedor_id',$vendedor_id);
$sql->bindParam(':cliente_id',$cliente_id);
$sql->bindParam(':natureza_id',$natureza_id);;
$sql->execute();
header('location:venda.php');



?>