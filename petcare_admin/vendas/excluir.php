<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->prepare("DELETE FROM tb_venda WHERE id = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();

    // Adiciona uma mensagem de sucesso
    $_SESSION['message'] = "Venda excluída com sucesso!";
}

// Redireciona para a página de vendas
header('location:venda.php');
exit();
?>
