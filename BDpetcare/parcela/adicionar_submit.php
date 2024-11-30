<?php
include('../config/conecta.php');

$receber_id = $_POST['receber_id'];
$dt_emissao_p = $_POST['dt_emissao_p'];
$dt_recto = $_POST['dt_recto'];
$dt_vencto = $_POST['dt_vencto'];
$vl_juros = $_POST['vl_juros'];
$vl_multa = $_POST['vl_multa'];
$vl_parcela = $_POST['vl_parcela'];
$vl_recebido = $_POST['vl_recebido'];

$conn = new PDO("mysql:host=localhost;dbname=petcare;charset=utf8", "root", "");

$sql = $conn->prepare("INSERT INTO tb_parcela
(receber_id, dt_emissao_p, dt_recto, dt_vencto, vl_juros, vl_multa, vl_parcela, vl_recebido) 
VALUES (:receber_id, :dt_emissao_p, :dt_recto, :dt_vencto, :vl_juros, :vl_multa, :vl_parcela, :vl_recebido)");

$sql->bindParam(':receber_id', $receber_id);
$sql->bindParam(':dt_emissao_p', $dt_emissao_p);
$sql->bindParam(':dt_recto', $dt_recto);
$sql->bindParam(':dt_vencto', $dt_vencto);
$sql->bindParam(':vl_juros', $vl_juros);
$sql->bindParam(':vl_multa', $vl_multa);
$sql->bindParam(':vl_parcela', $vl_parcela);
$sql->bindParam(':vl_recebido', $vl_recebido);


$sql->execute();

header('Location: parcela.php');
?>
