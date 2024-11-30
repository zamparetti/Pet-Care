<?php
include('../config/conecta.php');

// Captura os dados do formulário
$nm_usuario = $_POST['nm_usuario'];
$email_usuario = $_POST['email_usuario'];
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];

// Prepara e executa a consulta SQL para inserir o usuário
$sql = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, email_usuario, login_usuario, senha_usuario) VALUES (:nm_usuario, :email_usuario, :login_usuario, :senha_usuario)");
$sql->bindParam(':nm_usuario', $nm_usuario);
$sql->bindParam(':email_usuario', $email_usuario);
$sql->bindParam(':login_usuario', $login_usuario);
$sql->bindParam(':senha_usuario', $senha_usuario);
$sql->execute();

// Adiciona a mensagem de sucesso na sessão
session_start();  // Inicia a sessão para usar a variável $_SESSION
$_SESSION['message'] = 'Usuário adicionado com sucesso!';

// Redireciona para a página de usuários
header('location:usuario.php');
exit();
?>