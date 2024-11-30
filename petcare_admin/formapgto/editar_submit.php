<?php
session_start();
include('../config/conecta.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_forma_pgto = $_POST['id_forma_pgto'];
    $nm_forma_pgto = $_POST['nm_forma_pgto'];

    $sql = $conn->prepare("UPDATE tb_forma_pgto SET nm_forma_pgto = :nm_forma_pgto WHERE id_forma_pgto = :id_forma_pgto");
    $sql->bindParam(':nm_forma_pgto', $nm_forma_pgto);
    $sql->bindParam(':id_forma_pgto', $id_forma_pgto);

    if ($sql->execute()) {
        $_SESSION['message'] = "Forma de pagamento atualizada com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao atualizar forma de pagamento.";
    }
    header('Location: formapgto.php');
    exit;
}
