<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_regiao']) && !empty($_POST['nm_regiao'])) {
    $id_regiao = $_POST['id_regiao'];
    $nm_regiao = $_POST['nm_regiao'];

    $sql = $conn->prepare("UPDATE tb_regiao SET nm_regiao = :nm_regiao WHERE id_regiao = :id_regiao");
    $sql->bindParam(':id_regiao', $id_regiao, PDO::PARAM_INT);
    $sql->bindParam(':nm_regiao', $nm_regiao);

    if ($sql->execute()) {
        $_SESSION['message'] = 'Região atualizada com sucesso!';
        header('location:regiao.php');
        exit;
    } else {
        echo "Erro ao atualizar a região.";
    }
}
?>
