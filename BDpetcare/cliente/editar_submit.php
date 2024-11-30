<?php
include('../config/conecta.php');

$id_cliente = $_POST['id_cliente'];
$nm_cliente = $_POST['nm_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$end_rua = $_POST['end_rua'];
$end_nro = $_POST['end_nro'];
$end_bairro = $_POST['end_bairro'];
$cidade_id = $_POST['cidade_id'];


$sql = $conn->prepare("UPDATE tb_cliente SET 
    nm_cliente = :nm_cliente, 
    cpf_cliente = :cpf_cliente, 
    end_rua = :end_rua, 
    end_nro = :end_nro, 
    end_bairro = :end_bairro, 
    cidade_id = :cidade_id
    WHERE id_cliente = :id_cliente");

$sql->bindParam(':nm_cliente', $nm_cliente);
$sql->bindParam(':cpf_cliente', $cpf_cliente);
$sql->bindParam(':end_rua', $end_rua);
$sql->bindParam(':end_nro', $end_nro);
$sql->bindParam(':end_bairro', $end_bairro);
$sql->bindParam(':cidade_id', $cidade_id);
$sql->bindParam(':id_cliente', $id_cliente);

$sql->execute();

header('Location: cliente.php');
?>
