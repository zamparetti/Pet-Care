<?php
include ('../config/conecta.php');
$id_itens_compra=$_POST['id_itenscompra'];
$qtd_itenscompra=$_POST['qtd_itenscompra'];
$pr_unitario=$_POST['pr_unitario'];
$compra_id=$_POST['compra_id'];
$produto_id=$_POST['produto_id'];


$sql=$conn->prepare("UPDATE tb_itenscompra SET qtd_itenscompra= :qtd_itenscompra, pr_unitario= :pr_unitario, compra_id= :compra_id, produto_id= :produto_id
WHERE id_itenscompra= :id_itenscompra");
$sql->bindParam(':id_itenscompra',$id_itenscompra);
$sql->bindParam(':qtd_itenscompra', $qtd_itenscompra);
$sql->bindParam(':pr_unitario', $pr_unitario);
$sql->bindParam(':compra_id', $compra_id);
$sql->bindParam(':produto_id', $produto_id);
$sql->execute();
header('location:itenscompra.php');


?>