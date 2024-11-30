<?php
session_start(); // Inicia a sessão

$nome = $_POST['nome'];
$uf = $_POST['uf'];
$regiao_id = $_POST['regiao_id'];

include('../config/conecta.php');

try {
    $conn = new PDO("mysql:host=localhost;dbname=petcare;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = $conn->prepare("INSERT INTO tb_estado (nome, uf, regiao_id) VALUES (:nome, :uf, :regiao_id)"); 
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':uf', $uf);
    $sql->bindParam(':regiao_id', $regiao_id);
    $sql->execute();

    // Define uma mensagem de sucesso na sessão
    $_SESSION['message'] = "Estado adicionado com sucesso!";
} catch (PDOException $e) {
    // Define uma mensagem de erro na sessão
    $_SESSION['message'] = "Erro ao adicionar estado: " . $e->getMessage();
}

// Redireciona para a página de estados
header('location: estado.php');
exit();
?>
