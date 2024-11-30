<?php
session_start(); // Inicia a sessão

include('../config/conecta.php');

// Recebendo os dados do formulário
$id_fornecedor = $_POST['id_fornecedor'];
$nm_fornecedor = trim($_POST['nm_fornecedor']);
$cidade_id = $_POST['cidade_id'];
$cpf_fornecedor = trim($_POST['cpf_fornecedor']);
$email_fornecedor = trim($_POST['email_fornecedor']);
$cnpj_fornecedor = trim($_POST['cnpj_fornecedor']);
$telefone_fornecedor = trim($_POST['telefone_fornecedor']);

// Validação básica (você pode expandir isso conforme necessário)
if (empty($nm_fornecedor) || empty($cidade_id) || empty($cpf_fornecedor) || empty($email_fornecedor)) {
    $_SESSION['msg'] = 'Todos os campos devem ser preenchidos.';
    header('Location: fornecedor.php');
    exit();
}

if (!filter_var($email_fornecedor, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['msg'] = 'Email inválido.';
    header('Location: fornecedor.php');
    exit();
}

try {
    // Prepara a consulta SQL
    $sql = $conn->prepare("
        UPDATE tb_fornecedor 
        SET nm_fornecedor = :nm_fornecedor, 
            cidade_id = :cidade_id, 
            cpf_fornecedor = :cpf_fornecedor, 
            email_fornecedor = :email_fornecedor, 
            cnpj_fornecedor = :cnpj_fornecedor, 
            telefone_fornecedor = :telefone_fornecedor 
        WHERE id_fornecedor = :id_fornecedor
    ");

    // Vincula os parâmetros
    $sql->bindParam(':nm_fornecedor', $nm_fornecedor);
    $sql->bindParam(':cidade_id', $cidade_id);
    $sql->bindParam(':cpf_fornecedor', $cpf_fornecedor);
    $sql->bindParam(':email_fornecedor', $email_fornecedor);
    $sql->bindParam(':cnpj_fornecedor', $cnpj_fornecedor);
    $sql->bindParam(':telefone_fornecedor', $telefone_fornecedor);
    $sql->bindParam(':id_fornecedor', $id_fornecedor);

    // Executa a consulta
    $sql->execute();

    // Armazena a mensagem de sucesso na sessão
    $_SESSION['msg'] = 'Fornecedor atualizado com sucesso!';

} catch (PDOException $e) {
    // Armazena a mensagem de erro na sessão
    $_SESSION['msg'] = 'Erro ao atualizar fornecedor: ' . $e->getMessage();
}

// Redireciona para a lista de fornecedores
header('Location: fornecedor.php');
exit();
?>
