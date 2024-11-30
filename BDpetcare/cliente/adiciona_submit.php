<?php
$nm_cliente = $_POST['nm_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$end_rua = $_POST['end_rua'];
$end_nro = $_POST['end_nro'];
$end_bairro = $_POST['end_bairro'];
$cidade_id = $_POST['cidade_id'];

include('../config/conecta.php');
$sql=$conn->prepare("INSERT INTO tb_cliente (nm_cliente, cpf_cliente, end_rua, end_nro, end_bairro, cidade_id) 
VALUES (:nm_cliente, :cpf_cliente, :end_rua, :end_nro, :end_bairro, :cidade_id ) ");
$sql->bindParam(':nm_cliente', $nm_cliente);
$sql->bindParam(':cpf_cliente', $cpf_cliente);
$sql->bindParam(':end_rua', $end_rua);
$sql->bindParam(':end_nro', $end_nro);
$sql->bindParam(':end_bairro', $end_bairro);
$sql->bindParam(':cidade_id', $cidade_id);
$sql->execute();

header('location:cliente.php');

?>