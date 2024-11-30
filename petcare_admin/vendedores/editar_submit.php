<?php
session_start();

include('../config/conecta.php');

$nm_vendedor = $_POST['nm_vendedor'] ?? '';
$perc_comissao = $_POST['perc_comissao'] ?? '';
$id = $_POST['id_vendedor'] ?? '';

// Validação básica
if (empty($nm_vendedor) || !is_numeric($perc_comissao) || $perc_comissao < 0 || empty($id)) {
    $_SESSION['message'] = "Erro: Nome do vendedor não pode estar vazio, a porcentagem de comissão deve ser um número positivo e o ID deve ser válido.";
    header('Location: vendedor.php');
    exit;
}

try {
    $sql = $conn->prepare("UPDATE tb_vendedor SET nm_vendedor = :nm_vendedor, perc_comissao = :perc_comissao WHERE id_vendedor = :id");
    $sql->bindParam(':nm_vendedor', $nm_vendedor);
    $sql->bindParam(':perc_comissao', $perc_comissao);
    $sql->bindValue(':id', $id);
    $sql->execute();

    $_SESSION['message'] = "Vendedor atualizado com sucesso!";
    header('Location: vendedor.php');
    exit;

} catch (PDOException $e) {
    $_SESSION['message'] = "Erro ao atualizar vendedor: " . htmlspecialchars($e->getMessage());
    header('Location: vendedor.php');
    exit;
}
?>
