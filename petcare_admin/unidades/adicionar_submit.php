<?php
session_start(); // Inicia a sessão

// Verifica se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nm_unidade = $_POST['nm_unidade'];
    $sigla_unidade = $_POST['sigla_unidade'];

    include('../config/conecta.php');

    try {
        $sql = $conn->prepare("INSERT INTO tb_unidade (nm_unidade, sigla_unidade) VALUES (:nm_unidade, :sigla_unidade)");
        $sql->bindParam(':nm_unidade', $nm_unidade);
        $sql->bindParam(':sigla_unidade', $sigla_unidade);
        
        // Executa a consulta
        if ($sql->execute()) {
            // Mensagem de sucesso
            $_SESSION['message'] = "Unidade adicionada com sucesso!";
        } else {
            // Mensagem de erro
            $_SESSION['message'] = "Erro ao adicionar a unidade.";
        }
    } catch (Exception $e) {
        // Mensagem de erro em caso de exceção
        $_SESSION['message'] = "Erro: " . $e->getMessage();
    }

    // Redireciona para a página de listagem de unidades
    header('location: unidade.php');
    exit();
}
?>
