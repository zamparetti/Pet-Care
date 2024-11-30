<?php

require 'config/conecta.php';
include('../Login/acesso.php');

// Verifique se a variável de sessão 'id_venda' está definida
if (isset($_SESSION['id_venda']) && isset($_SESSION['dados']) && !empty($_SESSION['dados'])) {
    $id_venda = $_SESSION['id_venda'];

    // Percorrendo os dados do carrinho
    foreach ($_SESSION['dados'] as $produtos) {
        // Preparando a consulta para inserir os itens na tabela de itens de venda
        $sql = $conn->prepare("INSERT INTO tb_itensvenda (id_Venda, fk_id_produto, qtd_itensvenda, preco_unitario) 
                               VALUES (:id_venda, :fk_id_produto, :qtd_itensvenda, :preco_unitario)");

        // Vinculando os parâmetros
        $sql->bindParam(':id_venda', $id_venda);
        $sql->bindParam(':fk_id_produto', $produtos['id_produto']);
        $sql->bindParam(':qtd_itensvenda', $produtos['quantidade']);
        $sql->bindParam(':preco_unitario', $produtos['preco_unitario']);
        
        // Executando a inserção no banco
        $sql->execute();
    }

    // Após a inserção, destrói os dados da sessão para finalizar a venda
    session_destroy();

    // Redireciona para a página principal após finalizar a venda
    header('Location: finalizarCompra.php');
    exit; // Adicionando exit após header para garantir que o código não continue executando
} else {
    // Caso a variável 'id_venda' ou 'dados' não esteja definida ou esteja vazia, redireciona para a página principal
    echo "Sessão inválida. Nenhuma venda encontrada.";
    header('Location: carrinho.php');
    exit;
}
?>
