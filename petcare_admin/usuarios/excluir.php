<?php
session_start(); // Inicia a sessão para enviar mensagens de erro/sucesso

include('../config/conecta.php');

// Verifica se existe um ID na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepara a consulta para excluir o usuário
        $sql = $conn->prepare("DELETE FROM tb_usuario WHERE id_usuario = :id_usuario");
        $sql->bindParam(':id_usuario', $id);
        $sql->execute();

        // Mensagem de sucesso
        $_SESSION['message'] = "Usuário excluído com sucesso!";
        header('Location: usuario.php'); // Redireciona para a lista de usuários
        exit;

    } catch (Exception $e) {
        // Mensagem de erro em caso de falha
        $_SESSION['error_message'] = "Erro ao excluir o usuário: " . $e->getMessage();
        header('Location: usuario.php'); // Redireciona para a lista de usuários
        exit;
    }
} else {
    $_SESSION['error_message'] = "ID de usuário inválido.";
    header('Location: usuario.php'); // Redireciona para a lista de usuários
    exit;
}
?>