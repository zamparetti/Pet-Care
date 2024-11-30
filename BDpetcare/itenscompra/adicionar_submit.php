<?php
 
$qtd_itenscompra=$_POST['qtd_itenscompra'];
$pr_unitario=$_POST['pr_unitario'];
$compra_id=$_POST['compra_id'];
$produto_id_id=$_POST['produto_id'];

include ('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_itenscompra (qtd_itenscompra, pr_unitario, compra_id, produto_id) 
VALUES (:qtd_itenscompra, :pr_unitario, :compra_id, :produto_id)");
$sql->bindParam(':qtd_itenscompra',$qtd_itenscompra);
$sql->bindParam(':pr_unitario',$pr_unitario);
$sql->bindParam(':compra_id',$compra_id);
$sql->bindParam(':produto_id',$produto_id);;
$sql->execute();
header('location:itenscompra.php');



?>