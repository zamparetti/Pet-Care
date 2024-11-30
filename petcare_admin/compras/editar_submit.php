<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Obtém os dados do formulário
$id_compra = $_POST['id_compra'];
$data_compra = $_POST['data_compra'];
$fornecedor_id = $_POST['fornecedor_id'];

try {
    // Prepara a consulta SQL para atualizar a compra
    $sql = $conn->prepare("UPDATE tb_compra 
                           SET data_compra = :data_compra, fornecedor_id = :fornecedor_id 
                           WHERE id_compra = :id_compra");
    $sql->bindParam(':data_compra', $data_compra);
    $sql->bindParam(':fornecedor_id', $fornecedor_id);
    $sql->bindParam(':id_compra', $id_compra);

    // Executa a consulta
    if ($sql->execute()) {
        // Define mensagem de sucesso e armazena na sessão
        $_SESSION['message'] = "Compra atualizada com sucesso!";
    } else {
        // Mensagem de erro caso a atualização falhe
        $_SESSION['message'] = "Erro ao atualizar a compra.";
    }
} catch (PDOException $e) {
    // Captura exceções e define mensagem de erro
    $_SESSION['message'] = "Erro: " . $e->getMessage();
}

// Redireciona para a página de listagem de compras
header('Location: compra.php');
exit();
?>