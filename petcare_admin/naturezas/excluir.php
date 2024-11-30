<?php
include('../config/conecta.php');

// Verifica se o ID foi passado na URL
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a consulta SQL para deletar a natureza com o ID especificado
    $sql = $conn->prepare("DELETE FROM tb_natureza WHERE id_natureza = :id_natureza");
    $sql->bindParam(':id_natureza', $id, PDO::PARAM_INT);
    
    // Executa a consulta
    if ($sql->execute()) {
        // Define mensagem de sucesso e armazena na sessão
        session_start();
        $_SESSION['message'] = "Natureza excluída com sucesso!";
        
        // Redireciona para a página de listagem de naturezas após a exclusão
        header('Location: natureza.php');
        exit();
    } else {
        // Mensagem de erro caso a exclusão falhe
        echo "Erro ao excluir a natureza.";
    }
} else {
    echo "ID não especificado.";
}
?>
