<?php
include('../config/conecta.php');
session_start();

$id_produto = $_POST['id_produto'];
$nm_produto = $_POST['nm_produto'];
$grupo_id = $_POST['grupo_id'];
$unidade_id = $_POST['unidade_id'];
$preco_venda = $_POST['preco_venda'];
$preco_compra = $_POST['preco_compra'];
$qtd_estoque = $_POST['qtd_estoque'];
$nm_foto = $_POST['nm_foto'];
$sequencia = $_POST['sequencia'];

//pegar a sequencia atual
$sql_sequencia_atual = $conn->prepare("SELECT sequencia FROM tb_produto WHERE id_produto = :id_produto");
$sql_sequencia_atual->bindParam(':id_produto', $id_produto);
$sql_sequencia_atual->execute();
//receber os resultados como um array associativo.
$produto = $sql_sequencia_atual->fetch(PDO::FETCH_ASSOC);

if ($produto) {
    $sequencia_atual = $produto['sequencia'];

    if ($sequencia > $sequencia_atual) {
        //se maior, diminui todos entre a atual e a nova
        $sql_update = $conn->prepare(
            "UPDATE tb_produto SET sequencia = sequencia - 1 WHERE sequencia > :sequencia_atual AND sequencia <= :sequencia"
        );
        $sql_update->bindParam(':sequencia_atual', $sequencia_atual);
        $sql_update->bindParam(':sequencia', $sequencia);
    } else {
        //se menor, aumenta todos entre a atual e a nova
        $sql_update = $conn->prepare(
            "UPDATE tb_produto SET sequencia = sequencia + 1 WHERE sequencia >= :sequencia AND sequencia < :sequencia_atual"
        );
        $sql_update->bindParam(':sequencia_atual', $sequencia_atual);
        $sql_update->bindParam(':sequencia', $sequencia);
    }
    $sql_update->execute();

    $sql = $conn->prepare("UPDATE tb_produto SET nm_produto = :nm_produto, grupo_id = :grupo_id, unidade_id = :unidade_id, 
        preco_venda = :preco_venda, preco_compra = :preco_compra, qtd_estoque = :qtd_estoque, nm_foto = :nm_foto, sequencia = :sequencia 
        WHERE id_produto = :id_produto"
    );
    $sql->bindParam(':nm_produto', $nm_produto);
    $sql->bindParam(':grupo_id', $grupo_id);
    $sql->bindParam(':unidade_id', $unidade_id);
    $sql->bindParam(':preco_venda', $preco_venda);
    $sql->bindParam(':preco_compra', $preco_compra);
    $sql->bindParam(':qtd_estoque', $qtd_estoque);
    $sql->bindParam(':nm_foto', $nm_foto);
    $sql->bindParam(':sequencia', $sequencia);
    $sql->bindParam(':id_produto', $id_produto);

    if ($sql->execute()) {
        $_SESSION['mensagem'] = "Produto atualizado com sucesso.";
        $_SESSION['tipo_mensagem'] = "success";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar o produto.";
        $_SESSION['tipo_mensagem'] = "danger";
    }
} else {
    $_SESSION['mensagem'] = "Produto não encontrado.";
    $_SESSION['tipo_mensagem'] = "danger";
}

header('Location: produto.php');
?>
