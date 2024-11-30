<?php
session_start();
include('../config/conecta.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $conn->prepare("DELETE FROM tb_forma_pgto WHERE id_forma_pgto = :id");
    $sql->bindParam(':id', $id);

    if ($sql->execute()) {
        $_SESSION['message'] = "Forma de pagamento excluída com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao excluir forma de pagamento.";
    }
}

header('Location: formapgto.php');
exit;
