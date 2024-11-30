<?php
include ('../config/conecta.php');
$id_produto=$_POST['id_produto'];
$qtd_itensvenda=$_POST['qtd_itensvenda'];
$venda_id=$_POST['venda_id'];
$produto_id=$_POST['produto_id'];
$preco_venda=$_POST['preco_venda'];
$preco_compra=$_POST['preco_compra'];

$sql=$conn->prepare("UPDATE tb_itensvenda SET qtd_itensvenda= :qtd_itensvenda , venda_id= :venda_id, produto_id= :produto_id
WHERE id_itemvenda= :id_itemvenda");
$sql->bindParam(':qtd_itensvenda',$qtd_itensvenda);
$sql->bindParam(':id_produto', $id_produto);
$sql->bindParam(':venda_id', $venda_id);
$sql->bindParam(':produto_id', $produto_id);


$sql->execute();
header('location:itensvenda.php');


?>



