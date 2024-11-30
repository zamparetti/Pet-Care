<?php
include('../Login/acesso.php');

if (isset($_GET['remover']) && $_GET['remover'] == "carrinho") {
    $id_produto = $_GET['id'];

    unset($_SESSION['itens'][$id_produto]);

    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=carrinho.php">';
    exit; 
}
?>
