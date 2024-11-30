<?php
session_start(); // Inicia a sessão

if (!empty($_GET['id'])) {
    // Sanitiza e valida o parâmetro 'id' para garantir que seja um número inteiro
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id) {
        try {
            // Inclui o arquivo de conexão
            include('../config/conecta.php');

            // Prepara a consulta SQL para excluir o registro
            $sql = $conn->prepare("DELETE FROM tb_compra WHERE id_compra = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->execute();

            // Define a mensagem de sucesso na sessão
            $_SESSION['message'] = "Compra excluída com sucesso!";
        } catch (PDOException $e) {
            // Caso ocorra algum erro no banco de dados, captura a exceção
            $_SESSION['message'] = "Erro ao excluir compra: " . $e->getMessage();
        }
    } else {
        // Se o ID não for válido, envia uma mensagem de erro
        $_SESSION['message'] = "ID inválido para exclusão.";
    }
} else {
    // Se o ID não for passado na URL, envia uma mensagem de erro
    $_SESSION['message'] = "ID não fornecido.";
}

// Redireciona para a página de listagem de compras com a mensagem
header('Location: compra.php');
exit();
?>