<?php
session_start();

include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o ID é um número
    if (!is_numeric($id)) {
        $_SESSION['message'] = "Erro: ID inválido.";
        header('Location: vendedor.php');
        exit;
    }

    try {
        $sql = $conn->prepare("DELETE FROM tb_vendedor WHERE id_vendedor = :id_vendedor");
        $sql->bindParam(':id_vendedor', $id);
        $sql->execute();

        $_SESSION['message'] = "Vendedor excluído com sucesso!";
        header('Location: vendedor.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['message'] = "Erro ao excluir vendedor: " . htmlspecialchars($e->getMessage());
        header('Location: vendedor.php');
        exit;
    }
} else {
    $_SESSION['message'] = "Erro: ID não fornecido.";
    header('Location: vendedor.php');
    exit;
}
?>
