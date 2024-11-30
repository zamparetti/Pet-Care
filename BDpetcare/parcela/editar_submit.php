<?php
include('../config/conecta.php');

$id_parcela = $_POST['id_parcela'];
$receber_id = $_POST['receber_id'];
$dt_emissao_p = $_POST['dt_emissao_p'];
$dt_recto = $_POST['dt_recto'];
$dt_vencto = $_POST['dt_vencto'];
$vl_juros = $_POST['vl_juros'];
$vl_multa = $_POST['vl_multa'];
$vl_parcela = $_POST['vl_parcela'];
$vl_recebido = $_POST['vl_recebido'];


$sql=$conn->prepare("UPDATE tb_compra set data_compra=:data_compra, fornecedor_id= :fornecedor_id
WHERE id_compra= :id_compra");


$sql = $conn->prepare("UPDATE tb_parcela 
SET 
    receber_id = :receber_id, 
    dt_emissao_p = :dt_emissao_p, 
    dt_recto = :dt_recto, 
    dt_vencto = :dt_vencto, 
    vl_juros = :vl_juros, 
    vl_multa = :vl_multa, 
    vl_parcela = :vl_parcela, 
    vl_recebido = :vl_recebido
WHERE 
    id_parcela = :id_parcela");


$sql->bindParam(':receber_id', $receber_id);
$sql->bindParam(':dt_emissao_p', $dt_emissao_p);
$sql->bindParam(':dt_recto', $dt_recto);
$sql->bindParam(':dt_vencto', $dt_vencto);
$sql->bindParam(':vl_juros', $vl_juros);
$sql->bindParam(':vl_multa', $vl_multa);
$sql->bindParam(':vl_parcela', $vl_parcela);
$sql->bindParam(':vl_recebido', $vl_recebido);
$sql->bindParam(':id_parcela', $id_parcela);

$sql->execute();
header('location:parcela.php');
?>
