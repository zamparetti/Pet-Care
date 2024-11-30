<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Validação básica dos dados de entrada
if (!isset($_POST['id_cidade'], $_POST['nm_cidade'], $_POST['estado_id'])) {
    $_SESSION['message'] = 'Dados incompletos. Por favor, preencha todos os campos.';
    header('Location: cidade.php');
    exit();
}

$id_cidade = filter_var($_POST['id_cidade'], FILTER_VALIDATE_INT);
$nm_cidade = filter_var(trim($_POST['nm_cidade']), FILTER_SANITIZE_STRING);
$estado_id = filter_var($_POST['estado_id'], FILTER_VALIDATE_INT);

if ($id_cidade === false || $estado_id === false || empty($nm_cidade)) {
    $_SESSION['message'] = 'Dados inválidos. Por favor, tente novamente.';
    header('Location: cidade.php');
    exit();
}

try {
    $sql = $conn->prepare("UPDATE tb_cidade SET nm_cidade = :nm_cidade, estado_id = :estado_id WHERE id_cidade = :id_cidade");

    $sql->bindParam(':nm_cidade', $nm_cidade);
    $sql->bindParam(':estado_id', $estado_id);
    $sql->bindParam(':id_cidade', $id_cidade);

    if ($sql->execute()) {
        $_SESSION['message'] = 'Cidade atualizada com sucesso!';
    } else {
        $_SESSION['message'] = 'Erro ao atualizar a cidade.';
    }
} catch (PDOException $e) {
    $_SESSION['message'] = 'Erro ao atualizar a cidade: ' . $e->getMessage();
}

header('Location: cidade.php');
exit();
?>
