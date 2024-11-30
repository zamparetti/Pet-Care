<?php
session_start(); // Inicia a sessão

// Recebe os dados do formulário
$nm_produto = $_POST['nm_produto'];
$grupo_id = $_POST['grupo_id'];
$unidade_id = $_POST['unidade_id'];
$preco_venda = $_POST['preco_venda'];
$preco_compra = $_POST['preco_compra'];
$qtd_estoque = $_POST['qtd_estoque'];
$nm_foto = $_POST['nm_foto'];
$sequencia = $_POST['sequencia'];

include('../config/conecta.php');

try {
    // Atualiza a sequência dos produtos
    $sql_atualizar = $conn->prepare("UPDATE tb_produto SET sequencia = sequencia + 1 WHERE sequencia >= :sequencia");
    $sql_atualizar->bindParam(':sequencia', $sequencia);
    $sql_atualizar->execute();

    // Insere o novo produto no banco de dados
    $sql_inserir = $conn->prepare("INSERT INTO tb_produto (nm_produto, grupo_id, unidade_id, preco_venda, preco_compra, qtd_estoque, nm_foto, sequencia) 
    VALUES (:nm_produto, :grupo_id, :unidade_id, :preco_venda, :preco_compra, :qtd_estoque, :nm_foto, :sequencia)");

    $sql_inserir->bindParam(':nm_produto', $nm_produto);
    $sql_inserir->bindParam(':grupo_id', $grupo_id);
    $sql_inserir->bindParam(':unidade_id', $unidade_id);
    $sql_inserir->bindParam(':preco_venda', $preco_venda);
    $sql_inserir->bindParam(':preco_compra', $preco_compra);
    $sql_inserir->bindParam(':qtd_estoque', $qtd_estoque);
    $sql_inserir->bindParam(':nm_foto', $nm_foto);
    $sql_inserir->bindParam(':sequencia', $sequencia);

    if ($sql_inserir->execute()) {
        $_SESSION['mensagem'] = "Produto adicionado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar o produto.";
    }
} catch (Exception $e) {
    $_SESSION['mensagem'] = "Erro: " . $e->getMessage();
}

// Redireciona de volta para o formulário com a mensagem
header('Location: produto.php');
exit();
?>
