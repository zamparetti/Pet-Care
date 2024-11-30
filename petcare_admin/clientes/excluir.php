<?php 
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = $conn->prepare("DELETE FROM tb_cliente WHERE id_cliente = :id_cliente");
        $sql->bindParam(':id_cliente', $id);
        $sql->execute();

        // Mensagem de sucesso
        session_start();
        $_SESSION['message'] = "Cliente excluído com sucesso!";
    } catch (Exception $e) {
        // Mensagem de erro
        session_start();
        $_SESSION['message'] = "Erro ao excluir cliente: " . $e->getMessage();
    }

    header('Location: cliente.php');
    exit;
} else {
    // Mensagem caso o ID não esteja presente
    session_start();
    $_SESSION['message'] = "ID não especificado.";
    header('Location: cliente.php');
    exit;
}
?>