<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $dt_venda = $_POST['dt_venda'];
    $vendedor_id = $_POST['vendedor_id'];
    $cliente_id = $_POST['cliente_id'];
    $natureza_id = $_POST['natureza_id'];

    // Prepara a consulta de atualização
    $sql = $conn->prepare("UPDATE tb_venda SET dt_venda = :dt_venda, fk_id_vendedor = :vendedor_id, fk_id_cliente = :cliente_id, fk_id_natureza = :natureza_id WHERE id = :id");
    
    // Vincula os parâmetros
    $sql->bindParam(':id', $id);
    $sql->bindParam(':dt_venda', $dt_venda);
    $sql->bindParam(':vendedor_id', $vendedor_id);
    $sql->bindParam(':cliente_id', $cliente_id);
    $sql->bindParam(':natureza_id', $natureza_id);
    
    // Executa a consulta
    if ($sql->execute()) {
        $_SESSION['message'] = "Venda atualizada com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao atualizar a venda.";
    }
}

// Redireciona para a página de vendas
header('location:venda.php');
exit();
?>
