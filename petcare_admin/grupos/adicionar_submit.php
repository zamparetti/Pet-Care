<?php
session_start();
include('../config/conecta.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $nm_grupo = trim($_POST['nm_grupo']);

    try {
        // Prepare a consulta SQL para atualizar o grupo
        $sql = $conn->prepare("UPDATE tb_grupo SET nm_grupo = :nm_grupo WHERE id_grupo = :id_grupo");
        $sql->bindParam(':nm_grupo', $nm_grupo);
        $sql->bindParam(':id_grupo', $id_grupo);
        
        // Executa a consulta
        if ($sql->execute()) {
            $_SESSION['message'] = "Grupo atualizado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao atualizar o grupo.";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erro: " . htmlspecialchars($e->getMessage());
    }

    // Redireciona de volta para a página do grupo
    header("Location: grupo.php");
    exit();
}
?>
