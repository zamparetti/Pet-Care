<?php
session_start(); // Inicie a sessão
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = (int)$_GET['id']; // Sanitização: transforma em inteiro
    error_log("ID recebido: " . $id); // Log para verificar o ID

    try {
        // Verifica se a cidade existe
        $checkSql = $conn->prepare("SELECT COUNT(*) FROM tb_cidade WHERE id_cidade = :id");
        $checkSql->bindParam(':id', $id);
        $checkSql->execute();

        if ($checkSql->fetchColumn() > 0) {
            // Prepara a exclusão
            $sql = $conn->prepare("DELETE FROM tb_cidade WHERE id_cidade = :id");
            $sql->bindParam(':id', $id);

            if ($sql->execute()) {
                $_SESSION['message'] = 'Cidade excluída com sucesso';
            } else {
                $_SESSION['message'] = 'Erro ao excluir a cidade';
            }
        } else {
            $_SESSION['message'] = 'Cidade não encontrada';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Erro: ' . htmlspecialchars($e->getMessage());
    }

    header('Location: cidade.php');
    exit();
} else {
    $_SESSION['message'] = 'ID não especificado';
    header('Location: cidade.php');
    exit();
}
?>
