<?php
session_start(); // Inicia a sessão

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nm_natureza'])) {
    $nm_natureza = $_POST['nm_natureza'];
    include('../config/conecta.php');
    
    $sql = $conn->prepare("INSERT INTO tb_natureza (nm_natureza) VALUES (:nm_natureza)");
    $sql->bindParam(':nm_natureza', $nm_natureza);
    $sql->execute();

    $_SESSION['message'] = 'Natureza adicionada com sucesso!';
    header('Location: natureza.php');
    exit;
}
?>