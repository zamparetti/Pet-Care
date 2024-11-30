<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $nm_grupo = trim($_POST['nm_grupo']);

    try {
        // Atualiza o grupo
        $sql = $conn->prepare("UPDATE tb_grupo SET nm_grupo = :nm_grupo WHERE id_grupo = :id_grupo");
        $sql->bindParam(':nm_grupo', $nm_grupo);
        $sql->bindParam(':id_grupo', $id_grupo);
        
        if ($sql->execute()) {
            $_SESSION['message'] = "Grupo atualizado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao atualizar o grupo.";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erro: " . htmlspecialchars($e->getMessage());
    }

    // Redireciona para a página de grupos
    header("Location: grupo.php");
    exit();
}
?>
