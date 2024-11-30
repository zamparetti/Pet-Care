<?php
session_start(); // Inicie a sessão
include('../config/conecta.php');

// Verifi se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura e sanitiza os dados
    $nm_cidade = isset($_POST['nm_cidade']) ? trim($_POST['nm_cidade']) : '';
    $estado_id = isset($_POST['estado_id']) ? (int)$_POST['estado_id'] : 0; // Assegure-se de que estado_id é um número

    // Validação básica
    if (empty($nm_cidade) || $estado_id <= 0) {
        $_SESSION['message'] = 'Por favor, preencha todos os campos corretamente.';
        header('Location: adicionar.php'); // Redirecione para o formulário de adição
        exit();
    }

    try {
        $conn = new PDO("mysql:host=localhost;dbname=petcare;charset=utf8", "root", "");

        $sql = $conn->prepare("INSERT INTO tb_cidade (nm_cidade, estado_id) VALUES (:nm_cidade, :estado_id)");
        $sql->bindParam(':nm_cidade', $nm_cidade);
        $sql->bindParam(':estado_id', $estado_id);
        $sql->execute();

        // Mensagem de sucesso
        $_SESSION['message'] = 'Cidade adicionada com sucesso!';
        header('Location: cidade.php');
        exit();
    } catch (PDOException $e) {
        // Mensagem de erro
        $_SESSION['message'] = 'Erro ao adicionar a cidade: ' . htmlspecialchars($e->getMessage());
        header('Location: adicionar.php'); // Redirecione para o formulário de adição
        exit();
    }
} else {
    // Se a requisição não for POST, redirecione
    header('Location: adicionar.php');
    exit();
}
?>
