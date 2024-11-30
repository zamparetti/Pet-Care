<?php
session_start(); // Inicia a sessão

// Recebe os dados do formulário
$data_compra = $_POST['data_compra'];
$fornecedor_id = $_POST['fornecedor_id'];

// Verifica se os campos estão preenchidos
if (empty($data_compra) || empty($fornecedor_id)) {
    $_SESSION['message'] = "Por favor, preencha todos os campos.";
    header('Location: adicionar.php');
    exit();
}

// Inclui o arquivo de conexão
include('../config/conecta.php');

try {
    // Prepara a consulta SQL para inserir os dados na tabela tb_compra
    $sql = $conn->prepare("INSERT INTO tb_compra (data_compra, fornecedor_id) VALUES (:data_compra, :fornecedor_id)");
    $sql->bindParam(':data_compra', $data_compra);
    $sql->bindParam(':fornecedor_id', $fornecedor_id);

    // Executa a consulta
    $sql->execute();

    // Redireciona para a página de listagem de compras com uma mensagem de sucesso
    $_SESSION['message'] = "Compra adicionada com sucesso!";
    header('Location: compra.php');
    exit();
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    $_SESSION['message'] = "Erro: " . $e->getMessage();
    header('Location: adicionar.php');
    exit();
}
?>
