<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta SQL para deletar a unidade com o ID especificado
    $sql = $conn->prepare("DELETE FROM tb_unidade WHERE id_unidade = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Executa a consulta
    if ($sql->execute()) {
        // Define mensagem de sucesso e armazena na sessão
        $_SESSION['message'] = "Unidade excluída com sucesso!";
    } else {
        // Mensagem de erro caso a exclusão falhe
        $_SESSION['message'] = "Erro ao excluir a unidade.";
    }
} else {
    $_SESSION['message'] = "ID não especificado.";
}

// Redireciona para a página de listagem de unidades após a exclusão
header('Location: unidade.php');
exit();
?>
