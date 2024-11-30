<?php 
include('../config/conecta.php');

// Inicializando a sessão
session_start();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Preparar a consulta de exclusão
        $sql = $conn->prepare("DELETE FROM tb_grupo WHERE id_grupo = :id_grupo");
        $sql->bindParam(':id_grupo', $id);
        $sql->execute();

        // Mensagem de sucesso
        $_SESSION['message'] = "Grupo excluído com sucesso!";
    } catch (Exception $e) {
        // Mensagem de erro
        $_SESSION['message'] = "Erro ao excluir grupo: " . $e->getMessage();
    }

    // Redirecionar após a operação
    header('Location: grupo.php');
    exit;
} else {
    // Mensagem caso o ID não esteja presente
    $_SESSION['message'] = "ID não especificado.";
    header('Location: grupo.php');
    exit;
}
?>
