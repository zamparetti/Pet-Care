<?php
session_start(); // Inicia a sessão para usar $_SESSION

// Verifica se o campo nm_forma_pgto foi enviado
if (!empty($_POST['nm_forma_pgto'])) {
    $nm_forma_pgto = $_POST['nm_forma_pgto'];

    // Sanitiza a entrada para evitar XSS
    $nm_forma_pgto = htmlspecialchars(trim($nm_forma_pgto));

    include('../config/conecta.php'); // Inclui o arquivo de conexão (que já cria a variável $conn)

    // Prepara a consulta para inserir a nova forma de pagamento
    $sql = $conn->prepare("INSERT INTO tb_forma_pgto (nm_forma_pgto) VALUES (:nm_forma_pgto)");
    $sql->bindParam(':nm_forma_pgto', $nm_forma_pgto);

    try {
        // Executa a consulta
        $sql->execute();

        // Mensagem de sucesso (pode ser armazenada na sessão para exibir na próxima página)
        $_SESSION['message'] = "Forma de pagamento adicionada com sucesso!";
    } catch (PDOException $e) {
        // Mensagem de erro (armazenada na sessão para exibir ao usuário)
        $_SESSION['message'] = "Erro ao adicionar forma de pagamento: " . $e->getMessage();
    }

    // Redireciona de volta para a página formapgto.php
    header('Location: formapgto.php');
    exit;
} else {
    // Caso o campo nm_forma_pgto não tenha sido enviado
    $_SESSION['message'] = "Por favor, preencha o nome da forma de pagamento.";
    header('Location: formapgto.php');
    exit;
}
?>