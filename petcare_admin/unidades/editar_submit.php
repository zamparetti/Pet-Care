<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

$id_unidade = $_POST['id_unidade'];
$nm_unidade = $_POST['nm_unidade'];
$sigla_unidade = $_POST['sigla_unidade'];

try {
    // Prepara a consulta SQL para atualizar a unidade
    $sql = $conn->prepare("UPDATE tb_unidade SET nm_unidade = :nm_unidade, sigla_unidade = :sigla_unidade WHERE id_unidade = :id_unidade");
    $sql->bindParam(':nm_unidade', $nm_unidade);
    $sql->bindParam(':sigla_unidade', $sigla_unidade);
    $sql->bindParam(':id_unidade', $id_unidade);
    
    // Executa a consulta
    if ($sql->execute()) {
        // Define mensagem de sucesso e armazena na sessão
        $_SESSION['message'] = "Unidade atualizada com sucesso!";
    } else {
        // Mensagem de erro caso a atualização falhe
        $_SESSION['message'] = "Erro ao atualizar a unidade.";
    }
} catch (PDOException $e) {
    // Captura exceções e define mensagem de erro
    $_SESSION['message'] = "Erro: " . $e->getMessage();
}

// Redireciona para a página de listagem de unidades
header('Location: unidade.php');
exit();
?>
