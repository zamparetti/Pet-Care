<?php
session_start(); // Inicia a sessão
include('../config/conecta.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dt_venda = $_POST['dt_venda'];
    $vendedor_id = $_POST['vendedor_id'];
    $cliente_id = $_POST['cliente_id'];
    $natureza_id = $_POST['natureza_id'];

    // Prepara a consulta de inserção
    $sql = $conn->prepare("INSERT INTO tb_venda (dt_venda, fk_id_vendedor, fk_id_cliente, fk_id_natureza) 
                           VALUES (:dt_venda, :vendedor_id, :cliente_id, :natureza_id)");
    
    // Vincula os parâmetros
    $sql->bindParam(':dt_venda', $dt_venda);
    $sql->bindParam(':vendedor_id', $vendedor_id);
    $sql->bindParam(':cliente_id', $cliente_id);
    $sql->bindParam(':natureza_id', $natureza_id);

    // Executa a consulta
    if ($sql->execute()) {
        $_SESSION['message'] = "Venda adicionada com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao adicionar a venda.";
    }

    // Redireciona para a página de vendas
    header('Location: venda.php');
    exit();
}
?>