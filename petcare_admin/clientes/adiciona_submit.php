<?php
include('../config/conecta.php');

$nm_cliente = $_POST['nm_cliente'];
$cpf_cliente = $_POST['cpf_cliente'];
$end_rua = $_POST['end_rua'];
$end_nro = $_POST['end_nro'];
$end_bairro = $_POST['end_bairro'];
$cidade_id = $_POST['cidade_id'];

try {
    $sql = $conn->prepare("INSERT INTO tb_cliente (nm_cliente, cpf_cliente, end_rua, end_nro, end_bairro, cidade_id) 
    VALUES (:nm_cliente, :cpf_cliente, :end_rua, :end_nro, :end_bairro, :cidade_id)");
    $sql->bindParam(':nm_cliente', $nm_cliente);
    $sql->bindParam(':cpf_cliente', $cpf_cliente);
    $sql->bindParam(':end_rua', $end_rua);
    $sql->bindParam(':end_nro', $end_nro);
    $sql->bindParam(':end_bairro', $end_bairro);
    $sql->bindParam(':cidade_id', $cidade_id);
    $sql->execute();

    // Mensagem de sucesso
    session_start();
    $_SESSION['message'] = "Cliente adicionado com sucesso!";
    header('Location: cliente.php');
    exit;

} catch (Exception $e) {
    // Em caso de erro
    session_start();
    $_SESSION['message'] = "Erro ao adicionar cliente: " . $e->getMessage();
    header('Location: cliente.php');
    exit;
}
?>