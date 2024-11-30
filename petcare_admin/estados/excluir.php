<?php 
session_start(); // Inicia a sessão
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = $conn->prepare("DELETE FROM tb_estado WHERE id_estado = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['message'] = 'Estado excluído com sucesso';
        } else {
            $_SESSION['message'] = 'Erro: Estado não encontrado ou já excluído';
        }
    } catch (Exception $e) {
        $_SESSION['message'] = 'Erro ao excluir estado: ' . $e->getMessage();
    }
} else {
    $_SESSION['message'] = 'ID não especificado';
}

header('Location: estado.php');
exit();
?>
