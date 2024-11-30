<?php
session_start(); // Inicia a sessão para uso de mensagens

include('../config/conecta.php');

// Captura os dados do formulário e remove espaços em branco
$nm_fornecedor = trim($_POST['nm_fornecedor']);
$cidade_id = trim($_POST['cidade_id']);
$cpf_fornecedor = trim($_POST['cpf_fornecedor']);
$email_fornecedor = trim($_POST['email_fornecedor']);
$cnpj_fornecedor = trim($_POST['cnpj_fornecedor']);
$telefone_fornecedor = trim($_POST['telefone_fornecedor']);

// Aqui você pode adicionar validações adicionais, se necessário

// Cria uma conexão com o banco de dados
try {
    $sql = $conn->prepare("INSERT INTO tb_fornecedor (nm_fornecedor, cidade_id, cpf_fornecedor, email_fornecedor, cnpj_fornecedor, telefone_fornecedor) 
    VALUES (:nm_fornecedor, :cidade_id, :cpf_fornecedor, :email_fornecedor, :cnpj_fornecedor, :telefone_fornecedor)");
    
    // Associa os parâmetros
    $sql->bindParam(':nm_fornecedor', $nm_fornecedor);
    $sql->bindParam(':cidade_id', $cidade_id);
    $sql->bindParam(':cpf_fornecedor', $cpf_fornecedor);
    $sql->bindParam(':email_fornecedor', $email_fornecedor);
    $sql->bindParam(':cnpj_fornecedor', $cnpj_fornecedor);
    $sql->bindParam(':telefone_fornecedor', $telefone_fornecedor);
    
    // Executa a consulta
    $sql->execute();

    // Mensagem de sucesso
    $_SESSION['msg'] = "Fornecedor adicionado com sucesso!";
    header('Location: fornecedor.php');
    exit;

} catch (PDOException $e) { // Captura exceções relacionadas ao PDO
    // Em caso de erro
    $_SESSION['msg'] = "Erro ao adicionar fornecedor: " . $e->getMessage();
    header('Location: fornecedor.php');
    exit;
}
?>
