<?php
session_start(); // Inicie a sessão
include('../config/conecta.php'); // Certifique-se de que o arquivo de conexão está correto

// Verifique se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura e sanitiza os dados
    $nm_emitente = isset($_POST['nm_emitente']) ? trim($_POST['nm_emitente']) : '';
    $cidade_id = isset($_POST['cidade_id']) ? (int)$_POST['cidade_id'] : 0; // Assegure-se de que cidade_id é um número
    $cnpj_emitente = isset($_POST['cnpj_emitente']) ? trim($_POST['cnpj_emitente']) : '';
    $end_rua = isset($_POST['end_rua']) ? trim($_POST['end_rua']) : '';
    $end_nro = isset($_POST['end_nro']) ? trim($_POST['end_nro']) : '';
    $end_bairro = isset($_POST['end_bairro']) ? trim($_POST['end_bairro']) : '';

    // Validação básica
    if (empty($nm_emitente) || $cidade_id <= 0 || empty($cnpj_emitente) || empty($end_rua) || empty($end_bairro)) {
        $_SESSION['message'] = 'Por favor, preencha todos os campos corretamente.';
        header('Location: adicionar.php'); // Redirecione para o formulário de adição
        exit();
    }

    try {
        $conn = new PDO("mysql:host=localhost;dbname=petcare;charset=utf8", "root", "");

        $sql = $conn->prepare("INSERT INTO tb_emitente (nm_emitente, cidade_id, cnpj_emitente, end_rua, end_nro, end_bairro) 
                                VALUES (:nm_emitente, :cidade_id, :cnpj_emitente, :end_rua, :end_nro, :end_bairro)");
        $sql->bindParam(':nm_emitente', $nm_emitente);
        $sql->bindParam(':cidade_id', $cidade_id);
        $sql->bindParam(':cnpj_emitente', $cnpj_emitente);
        $sql->bindParam(':end_rua', $end_rua);
        $sql->bindParam(':end_nro', $end_nro);
        $sql->bindParam(':end_bairro', $end_bairro);
        $sql->execute();

        // Mensagem de sucesso
        $_SESSION['message'] = 'Emitente cadastrado com sucesso!';
        header('Location: emitente.php');
        exit();
    } catch (PDOException $e) {
        // Mensagem de erro
        $_SESSION['message'] = 'Erro ao cadastrar o emitente: ' . htmlspecialchars($e->getMessage());
        header('Location: adicionar.php'); // Redirecione para o formulário de adição
        exit();
    }
} else {
    // Se a requisição não for POST, redirecione
    header('Location: adicionar.php');
    exit();
}
?>