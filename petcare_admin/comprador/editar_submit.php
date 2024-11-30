<?php
session_start(); // Inicia a sessão para exibir mensagens de sucesso ou erro

// Verifica se os dados foram recebidos via POST
if (!empty($_POST['id_comprador']) && !empty($_POST['nm_comprador'])) {
    $id_comprador = $_POST['id_comprador'];
    $nm_comprador = $_POST['nm_comprador'];

    // Valida o ID (deve ser um número inteiro)
    if (is_numeric($id_comprador)) {
        include('../config/conecta.php');

        // Prepara a consulta SQL
        $sql = $conn->prepare("UPDATE tb_comprador SET nm_comprador = :nm_comprador WHERE id_comprador = :id_comprador");
        $sql->bindParam(':nm_comprador', $nm_comprador);
        $sql->bindParam(':id_comprador', $id_comprador, PDO::PARAM_INT);

        // Executa a consulta
        if ($sql->execute()) {
            // Se a atualização for bem-sucedida, define uma mensagem de sucesso
            $_SESSION['message'] = "Comprador atualizado com sucesso!";
        } else {
            // Caso ocorra algum erro, define uma mensagem de erro
            $_SESSION['message'] = "Erro ao atualizar comprador. Tente novamente.";
        }
    } else {
        // Caso o ID não seja válido, define uma mensagem de erro
        $_SESSION['message'] = "ID inválido.";
    }
} else {
    // Caso os dados não tenham sido recebidos corretamente, define uma mensagem de erro
    $_SESSION['message'] = "Dados inválidos ou incompletos.";
}

// Redireciona para a página de listagem de compradores
header('Location: comprador.php');
exit();
?>
