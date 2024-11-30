<?php
include('../config/conecta.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se os campos obrigatórios estão presentes
    if (!empty($_POST['nm_natureza']) && !empty($_POST['id_natureza'])) {
        $nm_natureza = $_POST['nm_natureza'];
        $id_natureza = $_POST['id_natureza'];

        // Prepara a consulta SQL para atualizar a natureza
        $sql = $conn->prepare("UPDATE tb_natureza SET nm_natureza = :nm_natureza WHERE id_natureza = :id_natureza");
        $sql->bindParam(':nm_natureza', $nm_natureza, PDO::PARAM_STR);
        $sql->bindParam(':id_natureza', $id_natureza, PDO::PARAM_INT);

        // Executa a consulta
        if ($sql->execute()) {
            // Define mensagem de sucesso e armazena na sessão
            session_start();
            $_SESSION['message'] = "Natureza atualizada com sucesso!";
        } else {
            // Define mensagem de erro e armazena na sessão
            session_start();
            $_SESSION['message'] = "Erro ao atualizar a natureza.";
        }
    } else {
        // Define mensagem de erro para campos faltantes e armazena na sessão
        session_start();
        $_SESSION['message'] = "Campos obrigatórios não preenchidos.";
    }
    
    // Redireciona para a página de listagem de naturezas
    header('Location: natureza.php');
    exit();
} else {
    echo "Método de requisição inválido.";
}
?>
