
<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    include('../config/conecta.php');

    //Daqui pra baixo é sobre a sequencia dos produtos (quando excluir um produto, a sequencia diminui -1)
    
    $sql_sequencia = $conn->prepare("SELECT sequencia FROM tb_produto WHERE id_produto = :id");
    $sql_sequencia->bindParam(':id', $id);
    $sql_sequencia->execute();
    $produto = $sql_sequencia->fetch(PDO::FETCH_ASSOC);
    
    if ($produto) {
        $sequencia = $produto['sequencia'];

        $sql_atualizar = $conn->prepare("UPDATE tb_produto SET sequencia = sequencia - 1 WHERE sequencia > :sequencia");
        $sql_atualizar->bindParam(':sequencia', $sequencia);
        $sql_atualizar->execute();

        $sql = $conn->prepare("DELETE FROM tb_produto WHERE id_produto = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
    }
}

header('location:produto.php');
?>
