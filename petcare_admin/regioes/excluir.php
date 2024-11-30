<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta SQL para deletar a região com o ID especificado
    $sql = $conn->prepare("DELETE FROM tb_regiao WHERE id_regiao = :id_regiao");
    $sql->bindParam(':id_regiao', $id, PDO::PARAM_INT);
    
    // Executa a consulta
    if ($sql->execute()) {
        // Define mensagem de sucesso e armazena na sessão
        $_SESSION['message'] = "Região excluída com sucesso!";
        
        // Redireciona para a página de listagem de regiões após a exclusão
        header('Location: regiao.php');
        exit();
    } else {
        // Mensagem de erro caso a exclusão falhe
        echo "Erro ao excluir a região.";
    }
} else {
    echo "ID não especificado.";
}
?>
