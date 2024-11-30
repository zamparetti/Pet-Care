<?php
session_start(); // Inicia a sessão

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    include('../config/conecta.php');

    try {
        // Preparar a declaração SQL
        $sql = $conn->prepare("DELETE FROM tb_fornecedor WHERE id_fornecedor = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT); // Bind como inteiro
        $sql->execute();

        // Mensagem de sucesso
        $_SESSION['msg'] = 'Fornecedor excluído com sucesso!';
    } catch (PDOException $e) {
        // Mensagem de erro
        $_SESSION['msg'] = 'Erro ao excluir fornecedor: ' . $e->getMessage();
    }
} else {
    // Mensagem caso o ID não seja válido
    $_SESSION['msg'] = 'ID inválido!';
}

// Redirecionar de volta para a página de fornecedores
header('location:fornecedor.php');
exit; // Certifique-se de que a execução do script seja interrompida após o redirecionamento
?>
