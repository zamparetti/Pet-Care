<?php
session_start(); // Inicia a sessão para usar mensagens de sucesso/erro

// Verifica se o ID foi passado e se é um número válido
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    include('../config/conecta.php');
    
    // Prepara e executa a exclusão
    $sql = $conn->prepare("DELETE FROM tb_comprador WHERE id_comprador = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);

    if ($sql->execute()) {
        // Define uma mensagem de sucesso na sessão
        $_SESSION['message'] = "Comprador excluído com sucesso!";
    } else {
        // Define uma mensagem de erro na sessão
        $_SESSION['message'] = "Erro ao excluir comprador. Tente novamente.";
    }
} else {
    // Caso não tenha um ID válido, define uma mensagem de erro
    $_SESSION['message'] = "ID inválido.";
}

// Redireciona de volta para a página de compradores
header('Location: comprador.php');
exit();
?>