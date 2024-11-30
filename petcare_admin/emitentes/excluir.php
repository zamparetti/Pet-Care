<?php
session_start();

if (!empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
    include('../config/conecta.php');

    try {
        $sql = $conn->prepare("DELETE FROM tb_emitente WHERE id_emitente = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        
        $_SESSION['success'] = 'Emitente excluído com sucesso.';
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erro ao excluir o emitente: ' . htmlspecialchars($e->getMessage());
    }
} else {
    $_SESSION['error'] = 'ID inválido.';
}

header('location:emitente.php');
exit;
?>
