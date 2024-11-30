<?php
session_start();

$nm_vendedor = $_POST['nm_vendedor'] ?? '';
$perc_comissao = $_POST['perc_comissao'] ?? '';

// Validação básica
if (empty($nm_vendedor) || !is_numeric($perc_comissao) || $perc_comissao < 0) {
    $_SESSION['message'] = "Erro: Nome do vendedor não pode estar vazio e a porcentagem de comissão deve ser um número positivo.";
    header('Location: vendedor.php');
    exit;
}

include('../config/conecta.php');

try {
    $sql = $conn->prepare("INSERT INTO tb_vendedor (nm_vendedor, perc_comissao) VALUES (:nm_vendedor, :perc_comissao)");
    $sql->bindValue(':nm_vendedor', $nm_vendedor);
    $sql->bindValue(':perc_comissao', $perc_comissao);
    $sql->execute();

    $_SESSION['message'] = "Vendedor adicionado com sucesso!";
    header('Location: vendedor.php');
    exit;

} catch (PDOException $e) {
    $_SESSION['message'] = "Erro ao adicionar vendedor: " . htmlspecialchars($e->getMessage());
    header('Location: vendedor.php');
    exit;
}
?>
