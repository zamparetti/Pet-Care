<?php
include('../config/conecta.php');
session_start(); // Inicia a sessão no início

// Verifica se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $id_emitente = $_POST['id_emitente'];
    $nm_emitente = $_POST['nm_emitente'];
    $cidade_id = $_POST['cidade_id'];
    $cnpj_emitente = $_POST['cnpj_emitente'];
    $end_rua = $_POST['end_rua'];
    $end_nro = $_POST['end_nro'];
    $end_bairro = $_POST['end_bairro'];

    // Prepara a consulta SQL para atualizar os dados do emitente
    $sql = $conn->prepare("UPDATE tb_emitente SET 
        nm_emitente = :nm_emitente, 
        cidade_id = :cidade_id, 
        cnpj_emitente = :cnpj_emitente, 
        end_rua = :end_rua, 
        end_nro = :end_nro, 
        end_bairro = :end_bairro 
        WHERE id_emitente = :id_emitente");

    // Vincula os parâmetros
    $sql->bindParam(':id_emitente', $id_emitente);
    $sql->bindParam(':nm_emitente', $nm_emitente);
    $sql->bindParam(':cidade_id', $cidade_id);
    $sql->bindParam(':cnpj_emitente', $cnpj_emitente);
    $sql->bindParam(':end_rua', $end_rua);
    $sql->bindParam(':end_nro', $end_nro);
    $sql->bindParam(':end_bairro', $end_bairro);

    // Executa a consulta e verifica se a atualização foi bem-sucedida
    if ($sql->execute()) {
        // Armazena uma mensagem de sucesso na sessão
        $_SESSION['message'] = 'Emitente atualizado com sucesso!';
    } else {
        // Armazena uma mensagem de erro na sessão
        $_SESSION['message'] = 'Erro ao atualizar o emitente.';
    }

    // Redireciona para a página de listagem de emitentes
    header('Location: emitente.php');
    exit();
} else {
    // Redireciona para a página de listagem se a requisição não for POST
    header('Location: emitente.php');
    exit();
}
?>